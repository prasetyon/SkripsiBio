<?php

namespace App\Http\Controllers;
use App\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
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
    
    public function getJam($id)
    {
        $jam = Jam::where('id_jam','like',$id)->get();
        
        $jams = $jam[0]->mulai.'-'.$jam[0]->selesai;
        return $jams;
    }
    
    public function load()
    {
        $jam1 = Jam::where('id_jam','like','1%')->get();
        $jam2 = Jam::where('id_jam','like','2%')->get();
        
        return view('jam/index')->with('jam1',$jam1)->with('jam2',$jam2);
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
        $jamedit = Jam::where('id_jam',$id)->get();
        $jam1 = Jam::where('id_jam','like','1%')->get();
        $jam2 = Jam::where('id_jam','like','2%')->get();
        
        return view('jam/index')->with('jam1',$jam1)->with('jam2',$jam2)->with('jamedit',$jamedit[0])->with('status','update');
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
        $jam = Jam::where('id_jam',$id)
            ->update(['mulai' => $request->mulai, 'selesai' => $request->selesai]);
        
        return redirect()->route('jam.index')->with('alert', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
