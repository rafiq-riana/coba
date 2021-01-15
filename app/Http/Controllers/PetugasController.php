<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Petugas::select('id_petugas', 'nama_petugas', 'username', 'password', 'level')
               ->orderBy('nama_petugas')
               ->whereNull('deleted_at')
               ->get();

        return view('admin.petugas', ['petugas' => $user]);
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
            'nama_petugas' => 'required|max:50',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $user = new Petugas;
        $user->nama_petugas = $request->nama_petugas;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect('/petugas')->with('success', 'Data berhasil ditambahkan!');
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
        $petugas = Petugas::find($id);
        return view('admin.editpetugas', compact('petugas'));
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
            'nama_petugas' => 'required|max:50',
            'username' => 'required',
            // 'password' => 'required',
            'level' => 'required'
        ]);

        $petugas = Petugas::find($id);
        $petugas->nama_petugas = $request->get('nama_petugas');
        $petugas->username = $request->get('username');
        // $petugas->password = Hash::make($request->get('password'));
        $petugas->level = $request->get('level');
        $petugas->save();

        return redirect('/petugas')->with('updated', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Petugas::findOrFail($id);
        $user->delete();

        return redirect('/petugas')->with('deleted', 'Data Deleted successfully!');
    }
}
