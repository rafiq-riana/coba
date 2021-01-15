<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::select('id_kelas', 'nama_kelas', 'jurusan')
        ->whereNull('deleted_at')
        ->get();

        return view('admin/kelas', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan'=> 'required|max:30',
            'nama_kelas'=> 'required|size:1'
        ]);

        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->save();

        return redirect('/kelas')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $kelas = Kelas::find($id);
        return view('admin.editkelas', compact('kelas'));
        // return view('admin.editkelas', ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan'=> 'required|max:30',
            'nama_kelas'=> 'required|max:1'
        ]);
        
        $kelas = Kelas::find($id);
        // dd($id);
        $kelas->jurusan = $request->get('jurusan');
        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->save();
        return redirect('/kelas')->with('success', 'Post edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect('/kelas');
    }
}
