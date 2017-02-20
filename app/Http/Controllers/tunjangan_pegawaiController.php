<?php

namespace App\Http\Controllers;
use App\tunjangan_pegawaiModel;
use App\tunjanganModel;
use App\pegawaiModel;
use Input ;
use Illuminate\Http\Request ;
class tunjangan_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        return view('tunjangan_pegawai.index',compact('tunjangan_pegawai'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tunjangan=tunjanganModel::all();
        $pegawai=pegawaiModel::all();
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        return view('tunjangan_pegawai.create',compact('tunjangan_pegawai','pegawai','tunjangan'));
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

            $tunjangan=Input::all();
            // dd($tunjangan);
            $pegawai=pegawaiModel::where('id',$tunjangan['pegawai_id'])->first();

            $relasionetoone=tunjangan_pegawaiModel::where('pegawai_id',$pegawai->id)->first();
            //isset fungsinya buat cari data ditabel yang dituju
            if (isset($relasionetoone)) {
                $error=true ;
                $tunjangan=tunjanganModel::all();
                $pegawai=pegawaiModel::all();
                $tunjangan_pegawai=tunjangan_pegawaiModel::all();
                return view('tunjangan_pegawai.create',compact('tunjangan_pegawai','pegawai','tunjangan','error'));     

            }

            $tunjangan=new tunjanganModel ;
            $tunjangan->kode_tunjangan=Input::get('kode_tunjangan') ;
            $tunjangan->jabatan_id=$pegawai->jabatan_id ;
            $tunjangan->golongan_id=$pegawai->golongan_id;
            $tunjangan->status=Input::get('status');
            $tunjangan->jumlah_anak=Input::get('jumlah_anak');
            $tunjangan->besaran_uang=Input::get('besaran_uang');
            $tunjangan->save();

            $tunjanganpegawai=new tunjangan_pegawaiModel ;
            $tunjanganpegawai['pegawai_id'] = $pegawai->id;
            $tunjanganpegawai['kode_tunjangan_id'] = $tunjangan->id;
            $tunjanganpegawai->save();
            return redirect('tunjangan_pegawai');
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
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        return view('tunjangan_pegawai.edit',compact('tunjangan_pegawai'));
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
        $Update=Request::all();
        $tunjangan_pegawai=tunjangan_pegawaiModel::find($id);
        $tunjangan_pegawai->update($Update);
        return redirect('tunjangan_pegawai');
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
        tunjangan_pegawaiModel::find($id)->delete();
        return redirect('tunjangan_pegawai');
    }
}
