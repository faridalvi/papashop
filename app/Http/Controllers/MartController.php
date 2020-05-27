<?php

namespace App\Http\Controllers;

use App\Mart;
use Illuminate\Http\Request;

class MartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mart  $mart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mart $mart)
    {
        //
    }
}
