<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PendapatanController extends Controller
{
    public function index()
    {
        $pendapatan = Pendapatan::all();

        return view('kelola.index', compact('pendapatan'));
    }

    public function entry()
    {
        return view('kelola.entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rentang_tanggal' => 'required|string',
            'kategori' => 'required|string',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Pendapatan::create($request->all());
        return redirect('kelola')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data=Pendapatan::findOrFail($id);
        return view('kelola.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rentang_tanggal' => 'required|string',
            'kategori' => 'required|string',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);
        $data=Pendapatan::findOrFail($id);
        $data->update($request->all());
        return redirect('kelola')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendapatan=Pendapatan::findOrFail($id);
        $pendapatan->delete();

        return redirect('kelola')->with('success', 'Data berhasil dihapus.');
    }
    public function cetak()
    {
        $pendapatan = pendapatan::all();
        $pdf = Pdf::loadview('kelola.cetak',compact('pendapatan'));
        return $pdf->download('laporan-pengelola.pdf');
    }
}

