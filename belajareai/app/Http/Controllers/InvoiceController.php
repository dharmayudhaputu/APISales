<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::all();

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
            'product_invoice' => 'required',
            'quantity_invoice' => 'required | numeric',
            'payment_method' => 'required',
            'tax_invoice' => 'required | numeric',
            'amount_invoice' => 'required | numeric'
        ]);

        $invoice = Invoice::create($request->all());
        if ($invoice) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Invoice Berhasil Ditambahkan',
                'data' => $invoice
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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice, $id)
    {
        $data = Invoice::where('id_invoice', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice, $id)
    {
        Invoice::where('id_invoice', $id)->update($request->all());
        return response()->json("Data Invoice Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::where('id_invoice', $id)->delete();

        return response()->json("Data Invoice Berhasil di Hapus");
    }
}