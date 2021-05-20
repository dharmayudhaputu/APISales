<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->validate($request, [
            'name_product' => 'required',
            'type_product' => 'required',
            'stock_product' => 'required | numeric',
            'unit_price_product' => 'required | numeric',
            'image_product' => 'required'
        ]);

        $image_product = $request->file('image_product')->getClientOriginalName();

        $request->file('image_product')->move('upload',$image_product);

        $data = [
            'name_product' => $request->input('name_product'),
            'type_product' => $request->input('type_product'),
            'stock_product' => $request->input('stock_product'),
            'unit_price_product' => $request->input('unit_price_product'),
            'image_product' => url('upload/'.$image_product)
        ];

        $product = Product::create($data);

        if ($product) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Product Berhasil Ditambahkan',
                'data' => $data
            ];
        } else {
            $result = [
                'status' => 400,
                'pesan' => 'Data Tidak Bisa Ditambahkan',
                'data' => ''
            ];
        }
        

        return response()->json($result, 200);

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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::where('id_product', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        Product::where('id_product', $id)->update($request->all());
        return response()->json("Data Product Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id_product', $id)->delete();

        return response()->json("Data Product Berhasil di Hapus");
    }
}