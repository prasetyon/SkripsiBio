<?php

namespace App\Http\Controllers;
use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
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
        $ruangan = Ruangan::all();
        return view('ruangan/index')->with('ruangan',$ruangan);
    }

    public function getRuangan($id)
    {
        $ruangan = Ruangan::where('id_ruangan','like',$id)->get();
//        dd($jam);
        $ruangans = $ruangan[0]->nama_ruangan;
        return $ruangans;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruangan = Ruangan::all();
        
        return view('ruangan/index')->with('ruangan',$ruangan)->with('status','create');
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
        $data = new Ruangan;
        $data->nama_ruangan = $request->get('nama');
        $data->save();
        
        return redirect()->route('ruangan.index')->with('alert', 'Create Success');
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
        $ruangan = Ruangan::all();
        $ruanganedit = Ruangan::where('id_ruangan',$id)->get();
        
        return view('ruangan/index')->with('ruangan',$ruangan)->with('status','update')->with('ruanganedit',$ruanganedit[0]);
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
        $ruangan = Ruangan::where('id_ruangan',$id)
            ->update(['nama_ruangan' => $request->nama]);
        
        return redirect()->route('ruangan.index')->with('alert', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Ruangan::where('id_ruangan',$id);
        $mhs->delete();
        return redirect()->route('ruangan.index')->with('alert', 'Delete Success');
    }
}
