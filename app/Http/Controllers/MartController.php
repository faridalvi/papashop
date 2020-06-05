<?php

namespace App\Http\Controllers;

use App\Mart;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class MartController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mart-list|mart-create|mart-edit|mart-delete', ['only' => ['index','store']]);
        $this->middleware('permission:mart-create', ['only' => ['create','store']]);
        $this->middleware('permission:mart-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:mart-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin) {
            $marts = Mart::all();
            return view('mart.index', compact('marts'));
        }
        else{
            $marts = Mart::where('user_id','=',Auth::user()->id)->get();
            return view('mart.index', compact('marts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:marts',
            'description'=> 'required',
        ]);
        $mart = new Mart();
        $mart->name = $request->name;
        $mart->description = $request->description;
        $mart->qrcode = str_slug($request->name,'-');
        $mart->user_id = Auth::user()->id;
        $save = $mart->save();
        if($save){
            return redirect()->back()->with('message','Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mart  $mart
     * @return \Illuminate\Http\Response
     */
    public function show(Mart $mart)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mart  $mart
     * @return \Illuminate\Http\Response
     */
    public function edit(Mart $mart)
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin) {
            $mart = Mart::where('id', '=', $mart->id)->first();
            return view('mart.edit', compact('mart'));
        }
        else if(Auth::user()->id == $mart->user_id){
            $mart = Mart::where('id', '=', $mart->id)->first();
            return view('mart.edit', compact('mart'));
        }
        else{
            return redirect()->back()->with('error','You are not Authorized');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mart  $mart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mart $mart)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
        ]);
        $mart =  Mart::find($mart->id);;
        $mart->name = $request->name;
        $mart->description = $request->description;
        $mart->qrcode = str_slug($request->name,'-');
        $mart->user_id = Auth::user()->id;
        $save = $mart->save();
        if($save){
            return redirect()->route('mart.index')->with('message','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mart  $mart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mart $mart)
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin){
            $destroy = Mart::destroy($mart->id);
            if($destroy){
                return redirect()->back()->with('message','Deleted Successfully');
            }
        }
        else if(Auth::user()->id == $mart->user_id){
            $destroy = Mart::destroy($mart->id);
            if($destroy){
                return redirect()->back()->with('message','Deleted Successfully');
            }
        }
        else{
            return redirect()->back()->with('error','You are not Authorized');
        }

    }
}
