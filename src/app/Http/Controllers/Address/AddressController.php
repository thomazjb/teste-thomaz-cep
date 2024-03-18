<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
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

    public function index()
    {
        $addresses = Address::all();
        return Inertia::render('Dashboard', ['addresses' => $addresses]);
    }

    public function create(Request $request)
    {
        Address::create($request->all());
        return Redirect::to('/dashboard');
    }

    public function store(Request $request)
    {
        Address::create($request->all());
        $addresses = Address::all();
        return  Inertia::render('Dashboard', ['addresses' => $addresses]);
    }
    public function edit(Request $request, Address $address)
    {   
        $newAddress = $request->all();
        $opa = Address::find($newAddress['id']);
        $opa->update($newAddress);

        return Redirect::to('/dashboard');
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('address.index');
    }

    public function destroy(Address $address)
    {   
        $address->delete(); // Exclua o endereço
        return Redirect::to('/dashboard');
    }
}
