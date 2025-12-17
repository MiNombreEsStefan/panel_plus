<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zadatak;
use Illuminate\Http\Request;


class ZadaciController extends Controller
{
    // LISTA
    public function index()
    {
        $zadaci = Zadatak::orderByDesc('created_at')->get();
        return view('admin.zadaci.index', compact('zadaci'));
    }

    // FORMA
    public function create()
    {
        return view('admin.zadaci.create');
    }

    // ČUVANJE
    public function store(Request $request)
    {
        $data = $request->validate([
            'naslov'   => 'required|string|max:255',
            'lokacija' => 'required|string|max:255',
            'opis'     => 'required|string|max:2000',
        ]);

        Zadatak::create([
            ...$data,
            'status' => 'U toku',
        ]);

        return redirect()
            ->route('admin.zadaci.index')
            ->with('success', 'Zadatak je kreiran.');
    }
   public function destroy(Zadatak $zadatak)
{
    $zadatak->slike()->delete();
    $zadatak->porukeMolbi()->delete();
    $zadatak->delete();

    return redirect()
        ->route('admin.zadaci.index')
        ->with('success', 'Zadatak je obrisan.');
}


    public function edit(Zadatak $zadatak)
{
    return view('admin.zadaci.edit', compact('zadatak'));
}
 public function update(Request $request, Zadatak $zadatak)
{
    $data = $request->validate([
        'naslov'   => ['required', 'string', 'max:255'],
        'lokacija' => ['required', 'string', 'max:255'],
        'opis'     => ['nullable', 'string'],
        'status'   => ['required', 'string', 'max:50'],
    ]);

    $zadatak->update($data);

    return redirect()
        ->route('admin.zadaci.index')
        ->with('success', 'Zadatak je uspešno izmenjen.');
}







}

