<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::select('id_spp', 'tahun_spp', 'nominal_spp')
        ->whereNull('deleted_at')
        ->orderBy('tahun_spp', 'asc')
        ->get();

        return view('admin.spp', compact('spp'));
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
            'tahun_spp'=> 'required|size:4',
            'nominal_spp'=> 'required'
        ]);

        $spp = new Spp;
        $spp->tahun_spp = $request->tahun_spp;
        $spp->nominal_spp = $request->nominal_spp;
        $spp->save();

        return redirect('/spp')->with('success', 'Data berhasil ditambahkan!');
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
        $spp = Spp::find($id);
        return view('admin.editspp', compact('spp'));
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
            'tahun_spp'=> 'required|size:4',
            'nominal_spp'=> 'required'
        ]);
        
        $spp = Spp::find($id);
        // dd($id);
        $spp->tahun_spp = $request->get('tahun_spp');
        $spp->nominal_spp = $request->get('nominal_spp');
        $spp->save();
        return redirect('/spp')->with('updated', 'Data Updated successfully!');
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
        $spp = Spp::find($id);
        $spp->delete();

        return redirect('/spp')->with('deleted', 'Data Deleted successfully!');
    }
}
