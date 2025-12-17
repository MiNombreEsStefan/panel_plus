<?php

namespace App\Http\Controllers\Montazer;

use App\Http\Controllers\Controller;
use App\Models\Zadatak;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Slika;



class ZadaciController extends Controller
{
    public function index()
    {
        $zadaci = Zadatak::orderByDesc('created_at')->get();

        return view('montazer.zadaci.index', compact('zadaci'));
    }

    public function show(Zadatak $zadatak)
    {
        $zadatak->load('slike', 'porukeMolbi', 'porukeMolbi.user');

        return view('montazer.zadaci.show', compact('zadatak'));
    }




    public function sendMolba(Request $request, Zadatak $zadatak)
{
    $request->validate([
        'tekst' => 'required|string|max:2000',
    ]);

    $zadatak->porukeMolbi()->create([
        'user_id' => Auth::id(),

        'tekst' => $request->tekst,
        'datum_vreme' => now(),
    ]);

    return back()->with('success', 'Molba je poslata.');
}
public function uploadSlika(Request $request, Zadatak $zadatak)
{
    $request->validate([
        'slika' => 'required|image|max:2048'
    ]);

    $path = $request->file('slika')->store('zadaci', 'public');

    $zadatak->slike()->create([
        'putanja' => $path
    ]);

    return back()->with('success', 'Slika je dodata.');
}
public function status(Request $request, Zadatak $zadatak)
{
    $request->validate([
        'status' => 'required|in:U toku,Završeno,Prekinuto'
    ]);

    $zadatak->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Status ažuriran.');
}


}