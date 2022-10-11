<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::orderBy('created_at', 'asc');

        if (request('search')) {
            $arsip->where('judul', 'like', '%' . request('search') . '%');
        }

        return view('arsip.index', [
            'arsip' => $arsip->get()
        ]);
    }
    public function create()
    {
        return view('arsip.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'surat' => 'required|mimes:pdf'
        ]);

        $arsip = new Arsip();
        $arsip->no_surat = $request->no_surat;
        $arsip->kategori = $request->kategori;
        $arsip->judul = $request->judul;
        $arsip->surat = $request->file('surat')->store('img-surat');
        $arsip->save();

        return redirect()->route('arsip.index')->with(['success' => 'Data berhasil disimpan']);
    }
    public function show($id)
    {
        $arsip = Arsip::find($id);

        return view('arsip.show', compact('arsip'));
    }
    public function edit($id)
    {
        $arsip = Arsip::find($id);

        return view('arsip.edit', compact('arsip'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'surat' => 'mimes:pdf'
        ]);

        $arsip = Arsip::find($id);
        $arsip->no_surat = $request->no_surat;
        $arsip->kategori = $request->kategori;
        $arsip->judul = $request->judul;

        if ($request->file('surat')) {
            Storage::delete($arsip->surat);
            $arsip->surat = $request->file('surat')->store('img-surat');
        }

        $arsip->update();

        return redirect()->route('arsip.index');
    }
    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        Storage::delete($arsip->surat);
        $arsip->delete();

        return redirect()->route('arsip.index');
    }
    public function download($id)
    {
        $arsip = Arsip::find($id);
        $file = public_path('/storage/' . $arsip->surat);

        return response()->download($file);
    }
}
