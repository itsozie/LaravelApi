<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id         = $request->input('id');
        $limit      = $request->input('limit',6);
        $name       = $request->input('name');
        $type       = $request->input('type');
        $slug       = $request->input('slug');
        $price_from = $request->input('price_form');
        $price_to   = $request->input('price_to');

        if ($id) {
            $product = Product::with('galleries')->find($id);

            if ($product)
                return ResponseFormatter::success($product, 'Data Berhasil Diambil');
            else
                return ResponseFormatter::failed(null, 'Data Produk Tidak Ditemukan', 404);
        
        
            }
        if ($slug) {
            $product = Product::with('galleries')->where('slug', $slug)->first();

            if ($product)
                return ResponseFormatter::success($product, 'Data Berhasil Diambil');
            else
                return ResponseFormatter::failed(null, 'Data Produk Tidak Ditemukan', 404);
        
        }

        $product = Product::with('galleries');

        if($name)
            $product->where('name', 'like', '%'. $name .'%');

        if($type)
            $product->where('type', 'like', '%'. $type .'%');

        if($price_from)
            $product->where('price', 'like', '>='. $price_from .'%');

        if($price_to)
            $product->where('price', 'like', '<='. $price_to .'%');

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Produk Berhasil Diambil'
        );
    }
}
