<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upit; // 👈 OVO DODAJ

class UpitiController extends Controller
{
    public function index()
    {
        $upiti = Upit::orderByDesc('created_at')->get();
        return view('admin.upiti.index', compact('upiti'));
    }

    

public function status(Request $request, Upit $upit)
{
    $data = $request->validate([
        'status' => ['required', 'in:NOVI,OBRADJEN,OBRISAN'],
    ]);

    $upit->update([
        'status' => $data['status'],
    ]);

    return back()->with('success', 'Status upita je ažuriran.');
}
public function obrisi(Upit $upit)
{
    $upit->delete();
    return back()->with('success', 'Upit obrisan.');
}
public function edit(Upit $upit)
{
    return view('admin.upiti.edit', compact('upit'));
}

public function update(Request $request, Upit $upit)
{
    $data = $request->validate([
        'status' => ['required', 'string', 'max:50'],
        'odgovor' => ['nullable', 'string', 'max:5000'],
    ]);

    $upit->update($data);

    return redirect()->route('admin.upiti.index')->with('success', 'Upit ažuriran.');
}


}


