<?php

namespace App\Http\Controllers;

use App\Mart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
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
            $mart = Mart::all();
            $products = Product::all();
            return view('product.index', compact('products', 'mart'));
        }
        else{
            $mart = Mart::where('user_id','=',Auth::user()->id)->get();
            $products = Product::where('user_id','=',Auth::user()->id)->get();
            return view('product.index', compact('products', 'mart'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin) {
            $marts = Mart::all();
            return view('product.create', compact('marts'));
        }
        else{
            $marts = Mart::where('user_id','=',Auth::user()->id)->get();
            return view('product.create', compact('marts'));
        }
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
            'mart'=> 'required',
            'price'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('image')->getClientOriginalExtension();
            $storeImage = $filename.'-'.time().'.'.$image_ext;
            $path =  $request->file('image')->storeAs('public/image',$storeImage);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $storeImage;
        $product->price = $request->price;
        $product->user_id = Auth::user()->id;
        $save = $product->save();
        $product->marts()->sync($request->mart);
        if($save){
            return redirect()->back()->with('message','Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin){
            $marts = Mart::all();
            $product = Product::where('id','=',$product->id)->first();
            return view('product.edit',compact('marts','product'));
        }
        else if(Auth::user()->id == $product->user_id){
            $marts = Mart::where('user_id','=',Auth::user()->id)->get();
            $product = Product::where('id','=',$product->id)->first();
            return view('product.edit',compact('marts','product'));
        }
        else{
            return redirect()->back()->with('error','You are not Authorized');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'mart'=> 'required',
        ]);
        if($request->hasFile('image')){
            $preImage = public_path('storage/image/'.$product->image);
            if (File::exists($preImage)) { // unlink or remove previous image from folder
                unlink($preImage);
            }
            $image_name = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('image')->getClientOriginalExtension();
            $storeImage = $filename.'-'.time().'.'.$image_ext;
            $path =  $request->file('image')->storeAs('public/image',$storeImage);
        }
        else{
            $storeImage = $product->image;
        }
        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->user_id = Auth::user()->id;
        $product->image = $storeImage;
        $product->price = $request->price;
        $product->marts()->sync($request->mart);
        $save = $product->save();
        if($save){
            return redirect()->route('product.index')->with('message','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin) {
            $destroy = Product::destroy($product->id);
            $image = public_path('storage/image/'.$product->image);
            if ($destroy) {
                File::delete($image);
                return redirect()->back()->with('message', 'Deleted Successfully');
            }
        }
        else if(Auth::user()->id == $product->user_id){
            $image = public_path('storage/image/'.$product->image);
            $destroy = Product::destroy($product->id);
            if ($destroy) {
                File::delete($image);
                return redirect()->back()->with('message', 'Deleted Successfully');
            }
        }
        else{
            return redirect()->back()->with('error','You are not Authorized');
        }
    }
}
