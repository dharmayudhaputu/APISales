<?php

namespace App\Http\Controllers;

use App\Models\Sales_order;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sales_order::all();

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
            'order_number' => 'required | numeric',
            'customer' => 'required',
            'quantity_sales_order' => 'required | numeric',
            'tax_sales_order' => 'required | numeric',
            'total_price' => 'required | numeric',
            'sales_person' => 'required'
        ]);

        $sales_order = Sales_order::create($request->all());
        if ($sales_order) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Sales Order Berhasil Ditambahkan',
                'data' => $sales_order
            ];
        } else {
            $result = [
                'status' => 400,
                'pesan' => 'Data Tidak Bisa Ditambahkan',
                'data' => ''
            ];
        }
        return response()->json($result);
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
     * @param  \App\Models\Sales_order  $sales_order
     * @return \Illuminate\Http\Response
     */
    public function show(Sales_order $sales_order, $id)
    {
        $data = Sales_order::where('id_sales_order', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales_order  $sales_order
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales_order $sales_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales_order  $sales_order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales_order $sales_order, $id)
    {
        Sales_order::where('id_sales_order', $id)->update($request->all());
        if ($sales_order) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Sales Order Berhasil di Update',
            ];
        } else {
            $result = [
                'status' => 400,
                'pesan' => 'Data Tidak Bisa Ditambahkan',
                'data' => ''
            ];
        }
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales_order  $sales_order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sales_order::where('id_sales_order', $id)->delete();

        return response()->json("Data Sales Order Berhasil di Hapus");
    }
}