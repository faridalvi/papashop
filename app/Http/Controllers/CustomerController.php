<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin) {
            $customers = Customer::with('products')->get();
            return view('customer.index',compact('customers'));
        }
        else{
            $customers = Customer::with('products')->where('user_id','=',Auth::user()->id)->get();
            return view('customer.index',compact('customers'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.customer');
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
            'name'=>'required',
            'email' => 'required',
            'phone'=>'required',
            'address'=> 'required'
        ]);

        $id = $request->product_id;
        $product = Product::where('id','=',$id)->first();
        $user_id = $product->user_id;

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->user_id = $user_id;
        $save = $customer->save();
        $customer->products()->sync($id);
        if($save){
            return redirect()->back()->with('message','Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Not uploaded');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $is_admin =Auth::user()->roles()->where('name', 'Admin')->exists();
        if($is_admin){
            $destroy = Customer::destroy($customer->id);
            if($destroy){
                return redirect()->back()->with('message','Deleted Successfully');
            }
        }
        else if (Auth::user()->id == $customer->user_id){
            $destroy = Customer::destroy($customer->id);
            if($destroy){
                return redirect()->back()->with('message','Deleted Successfully');
            }
        }
        else{
            return redirect()->back()->with('error','You are not Authorized');
        }
    }
}
