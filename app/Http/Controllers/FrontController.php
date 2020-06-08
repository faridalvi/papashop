<?php

namespace App\Http\Controllers;

use App\Mart;
use App\Product;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function mart_products(Request $request)
    {
        $qrcode = $request->get('qrcode');
        $products = Mart::with('products')
            ->where('qrcode','=',$qrcode)
            ->get();
        return response()->json($products,200);
    }

    public function index(){

        $marts = Mart::with('products')->get();
        return view('front.index',compact('marts'));
    }
    public function products(Request $request,$qrcode)
    {
        $qrcode = $request->qrcode;
        $marts = Mart::with('products')
            ->where('qrcode','=',$qrcode)
            ->get();
        return view('front.products',compact('marts'));
    }
}
