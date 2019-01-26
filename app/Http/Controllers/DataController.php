<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class DataController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('role')=='admin'){
            return redirect()->route('login');
        }
        else{
            return $this->load();
        }
    }
    
    public function load()
    {
        //
        $data = Mahasiswa::select('nim', 'nama_mhs as nama', 'judul', 'tanggal_sidang_proposal as sidang_proposal', 'tanggal_sidang_akhir as sidang_akhir', 'nama_pembimbing_1 as pembimbing1', 'nama_pembimbing_2 as pembimbing2', 'status')->get();
        
        return view('data/index')->with('data',$data);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}