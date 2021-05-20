<?php

namespace App\Http\Controllers;

use App\Models\Unpopular_product;
use Illuminate\Http\Request;

class UnpopularProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Unpopular_product::all();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name_unpopular_product' => 'required',
            'quantity_unpopular_product' => 'required | numeric',
            'price_unpopular_product' => 'required | numeric',
            'product_type_unpopular_product' => 'required',
            'image_unpopular_product' => 'required'
        ]);

        $image_unpopular_product = $request->file('image_unpopular_product')->getClientOriginalName();

        $request->file('image_unpopular_product')->move('upload/unpopular/',$image_unpopular_product);

        $data = [
            'name_unpopular_product' => $request->input('name_unpopular_product'),
            'quantity_unpopular_product' => $request->input('quantity_unpopular_product'),
            'price_unpopular_product' => $request->input('price_unpopular_product'),
            'product_type_unpopular_product' => $request->input('product_type_unpopular_product'),
            'image_unpopular_product' => url('upload/unpopular/'.$image_unpopular_product)
        ];

        $unpopular_product = Unpopular_product::create($data);

        if ($unpopular_product) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Unpopular Product Berhasil Ditambahkan',
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
     * @param  \App\Models\Unpopular_product  $unpopular_product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Unpopular_product::where('id_unpopular_product', $id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unpopular_product  $unpopular_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Unpopular_product $unpopular_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unpopular_product  $unpopular_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unpopular_product $unpopular_product, $id)
    {
        Unpopular_product::where('id_unpopular_product', $id)->update($request->all());
        return response()->json("Data Unpopular Product Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unpopular_product  $unpopular_product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unpopular_product::where('id_unpopular_product', $id)->delete();

        return response()->json("Data Unpopular Product Berhasil di Hapus");
    }
}