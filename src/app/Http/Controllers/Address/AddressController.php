<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class AddressController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $addresses = Addresses::all();
        return Inertia::render('Dashboard', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        Address::create($request->all());
        $addresses = Address::all();
        return Inertia::render('Dashboard'. ['addresses' => $addresses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Addresses::create($request->all());
        $addresses = Addresses::all();
        return  Inertia::render('Dashboard', ['addresses' => $addresses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Inertia\Response
     */
    public function show(Address $address)
    {
        return Inertia::render('Addresses/Show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Inertia\Response
     */
    public function edit(Address $address)
    {
        return Inertia::render('Addresses/Edit', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addresses  $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Addresses $address)
    {
        $address->delete();
        return Redirect::to('/dashboard');
    }
}
