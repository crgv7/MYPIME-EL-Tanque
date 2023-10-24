<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=Auth::user();
        $reservations=Reservations::where('correo', $user->email)->get();
        return inertia('Reservation/Index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user=Auth::user();
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',

            'fecha' => 'required',
            'cantidad_personas' => 'required',


        ]);
        $reservations=new Reservations($request->input());
        $reservations->correo=$user->email;
        $reservations->save();
        //echo "Hola mundo";
        return redirect('reservations');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservations=Reservations::find($id);
        $reservations->fill($request->input())->saveOrFail();
        return redirect('reservations');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservations=Reservations::find($id);
        $reservations->delete();
        return redirect('reservations');
        //
    }
}
