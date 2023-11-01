<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=Auth::user();
        $contacts=Contact::where('correo', $user->email)->get();
        return inertia('Contact/Index',compact('contacts'));
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
            'titulo' => 'required',
            'text' => 'required',




        ]);
        $reservations=new Contact($request->input());
        $reservations->correo=$user->email;
        $reservations->save();
        //echo "Hola mundo";
        return redirect('contacts');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $contacts=Contact::all();
        return inertia('Contact/show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservations=Contact::find($id);
        $reservations->fill($request->input())->saveOrFail();
        return redirect('contacts');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservations=Contact::find($id);
        $reservations->delete();
        return redirect('contacts');
        //
    }
}
