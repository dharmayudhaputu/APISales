<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Quotation::all();

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
            'product_quotation' => 'required',
            'quantity_quotation' => 'required | numeric',
            'unit_price_quotation' => 'required | numeric',
            'total_quotation' => 'required | numeric'
        ]);

        $quotation = Quotation::create($request->all());
        if ($quotation) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Quotation Berhasil Ditambahkan',
                'data' => $quotation
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
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        $data = Quotation::where('id_quotation', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation, $id)
    {
        Quotation::where('id_quotation', $id)->update($request->all());
        return response()->json("Data Quotation Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quotation::where('id_quotation', $id)->delete();

        return response()->json("Data Quotation Berhasil di Hapus");
    }
}