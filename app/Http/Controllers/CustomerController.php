<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['dataCustomer'] = customer::all();

        return view('admin.customer.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_line' => ['required'],
            'city'  => ['required'],
            'state'  => ['required'],
            'postal_code'  => ['required'],
            'country'  => ['required'],
            'membership_type'     => ['required', 'in:Regular,Premium,VIP'],
            'registration_date'   => ['required', 'date'],
            'last_purchase_date'   => ['required', 'date'],
            'total_spent'      => ['required', 'numeric'],
            'preferred_contact_method'     => ['required', 'in:Email,Phone,SMS'],
        ]);

        $data['address_line'] = $request->address_line;
        $data['city']  = $request->city;
        $data['state']  = $request->state;
        $data['postal_code']  = $request->postal_code;
        $data['country']  = $request->country;
        $data['membership_type']     = $request->membership_type;
        $data['registration_date']   = $request->registration_date;
        $data['last_purchase_date']   = $request->last_purchase_date;
        $data['total_spent']      = $request->total_spent;
        $data['preferred_contact_method']      = $request->preferred_contact_method;

        Customer::create($data);

        return redirect()->route('customer.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
