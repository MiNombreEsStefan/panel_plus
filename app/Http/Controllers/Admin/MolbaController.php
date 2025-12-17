<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PorukaMolbe;
use Illuminate\Http\Request;

class MolbaController extends Controller
{
    public function index()
    {
        $poruke = PorukaMolbe::with(['zadatak', 'user'])
            ->latest()
            ->get();

        return view('admin.molba.index', compact('poruke'));
    }
    public function reply(Request $request, PorukaMolbe $poruka)
    {
        $request->validate([
            'odgovor_admin' => 'required|string|max:2000',
            'status' => 'required|in:U toku,Završeno,Prekinuto',
        ]);

        // upis odgovora admina
        $poruka->update([
            'odgovor_admin' => $request->odgovor_admin,
        ]);

        // promena statusa zadatka
        $poruka->zadatak->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.molbe.index')
            ->with('success', 'Odgovor je uspešno poslat.');
    }

    
}

