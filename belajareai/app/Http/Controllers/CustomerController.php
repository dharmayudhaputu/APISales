<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();

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
            'name_customer' => 'required',
            'email_customer' => 'required',
            'address_customer' => 'required',
            'no_hp_customer' => 'required',
            'payment_method_customer' => 'required'
        ]);

        $customer = Customer::create($request->all());
        if ($customer) {
            $result = [
                'status' => 200,
                'pesan' => 'Data Customer Berhasil Ditambahkan',
                'data' => $customer
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, $id)
    {
        $data = Customer::where('id_customer', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, $id)
    {
        Customer::where('id_customer', $id)->update($request->all());
        return response()->json("Data Customer Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id_customer', $id)->delete();

        return response()->json("Data Customer Berhasil di Hapus");
    }
}