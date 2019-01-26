<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jadwal;

class JadwalController extends Controller
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
        $jadwal = Jadwal::where('tanggal','>',date("Y-m-d", time()))->orderBy('tanggal','asc')->orderBy('mulai','asc')->get();
//        dd(date("Y-m-d", time()));
        
        foreach($jadwal as $j)
        {
            $date = date_create($j->tanggal);
            $j->tanggal = date_format($date, "D, j-M-Y");
            $j->ruangan = app('App\Http\Controllers\RuanganController')->getRuangan($j->id_ruangan);
        }
        
        return view('jadwal.index')->with('jadwal',$jadwal);
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