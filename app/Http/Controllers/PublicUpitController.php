<?php

namespace App\Http\Controllers;

use App\Models\Upit;
use Illuminate\Http\Request;

class PublicUpitController extends Controller
{
    public function create()
    {
        return view('public.home');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ime_klijenta' => ['required','string','max:255'],
            'email'       => ['required','email','max:255'],
            'telefon'     => ['nullable','string','max:50'],
            'opis'        => ['required','string','max:2000'],
        ]);

        Upit::create([
            ...$data,
            'status' => 'NOVI',
        ]);

        return back()->with('success', 'Upit je uspešno poslat.');
    }
}
