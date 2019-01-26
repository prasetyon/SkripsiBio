<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

use App\Mahasiswa;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->session()->get('role')=='admin'){
            return redirect()->route('login');
        }
        else{
            $mhs = Mahasiswa::select('nim','nama_mhs','undangan_proposal','undangan_akhir','lempeng')->get();
            return view('files.index')->with('mhs', $mhs);
        }
    }

    public function generate($mhs)
    {
        if($mhs->keterangan=='proposal')
            $template_file_name = 'public/template/form_proposal.docx';
        else if($mhs->keterangan=='akhir')
            $template_file_name = 'public/template/form_skripsi.docx';
        
        $fileName = "undangan_sidang_".$mhs->keterangan.'_'. $mhs->nim . ".docx";

        $folder   = "public/undangan";
        
        $full_path = $folder . '/' . $fileName;

        try
        {
            if (!file_exists($folder))
            {
                mkdir($folder);
            }

            copy($template_file_name, $full_path);

            $zip_val = new ZipArchive;

            //Docx file is nothing but a zip file. Open this Zip File
            if($zip_val->open($full_path) == true)
            {
                $key_file_name = 'word/document.xml';
                $message = $zip_val->getFromName($key_file_name);                

                $timestamps = date('D, j-M-Y', time());
                $date = explode(',', $mhs->tanggal);
                
                echo $mhs->tanggal;
//                dd($date);
                
                $day = $this->translateDay($date[0]);
                $tanggal = $date[1];
                                    
                $message = str_replace("token_tanggal_surat", $timestamps, $message);
                $message = str_replace("token_nomor_surat", "XXX/XXX/XX/XXXX", $message);
                $message = str_replace("token_perihal", 'Sidang '.$mhs->keterangan, $message);   
                $message = str_replace("token_dosen_1", $mhs->nama_pembimbing_1, $message); 
                $message = str_replace("token_dosen_2", $mhs->nama_pembimbing_2, $message);
                $message = str_replace("token_dosen_3", $mhs->nama_penguji_1, $message);
                $message = str_replace("token_dosen_4", $mhs->nama_penguji_2, $message);
                $message = str_replace("token_dosen_5", $mhs->nama_penguji_3, $message);
                $message = str_replace("token_nip_1", $mhs->pembimbing_1, $message);
                $message = str_replace("token_nip_2", $mhs->pembimbing_2, $message);
                $message = str_replace("token_nip_3", $mhs->penguji_1, $message);
                $message = str_replace("token_nip_4", $mhs->penguji_2, $message);
                $message = str_replace("token_nip_5", $mhs->penguji_3, $message);
                $message = str_replace("token_hari_sidang", $day, $message);
                $message = str_replace("token_tanggal_sidang", $tanggal, $message);
                $message = str_replace("token_jam_sidang", $mhs->jam, $message);
                $message = str_replace("token_ruang_sidang", $mhs->ruang, $message);
                $message = str_replace("token_nama_mahasiswa", $mhs->nama_mhs, $message);
                $message = str_replace("token_nim", $mhs->nim, $message);
                $message = str_replace("token_judul", $mhs->judul, $message);

                $zip_val->addFromString($key_file_name, $message);
                $zip_val->close();
                
                return $full_path;
            }
        }
        catch (Exception $exc) 
        {
            $error_message =  "Error creating the Word Document";
            var_dump($exc);
            return null;
        }
    }
    
    private function translateDay($day)
    {
        if($day=='Sun') return 'Minggu';
        else if($day=='Mon') return 'Senin';
        else if($day=='Tue') return 'Selasa';
        else if($day=='Wed') return 'Rabu';
        else if($day=='Thu') return 'Kamis';
        else if($day=='Fri') return 'Jumat';
        else if($day=='Sat') return 'Sabtu';
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
