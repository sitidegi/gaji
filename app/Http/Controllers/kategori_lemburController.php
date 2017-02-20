<?php

namespace App\Http\Controllers;
use App\kategori_lemburModel;
use App\jabatanModel;
use App\golonganModel;
use Validator;
use Input;
use Request;

class kategori_lemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_lembur=kategori_lemburModel::paginate(10);
        return view('kategori_lembur.index',compact('kategori_lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_lembur=kategori_lemburModel::all();
        $jabatan=jabatanModel::all();
        $golongan=golonganModel::all();
        return view('kategori_lembur.create',compact('kategori_lembur','jabatan','golongan'));
    
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
        $definisi=['kode_lembur'=>'required|unique:kategori_lembur',
                   'besaran_uang'=>'required|numeric|min:0',
                   'jabatan_id'=>'required',
                   'golongan_id'=>'required',
                   ];


        $sms=['kode_lembur.required'=>'tidak boleh kosong',
               'kode_lembur.unique'=>'data tidak boleh sama',
               'kode_lembur.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',
               'jabatan_id.required'=>'tidak boleh kosong',
               'golongan_id.required'=>'tidak boleh kosong', 
               

               ];
        $kirim=Validator::make(Input::all(),$definisi,$sms);
        if ($kirim->fails()) {
            return redirect('kategori_lembur/create')->withErrors($kirim)->withInput();
        }
        
            

       $kategori_lembur=Request::all();
        kategori_lemburModel::create($kategori_lembur);
        return redirect('kategori_lembur');
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
        $jabatans=jabatanModel::all();
        $golongans=golonganModel::all();
        $kategori_lemburs=kategori_lemburModel::find($id);
        return view('kategori_lembur.edit',compact('kategori_lembur'));
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
        $cariid=kategori_lemburModel::find($id);
        if ($cariid->kode_lembur != Request('kode_lembur')) {
         
        $definisi=['kode_lembur'=>'required|unique:kategori_lembur',
                   'besaran_uang'=>'required|numeric|min:0',
                   'jabatan_id'=>'required',
                   'golongan_id'=>'required'];   

        }
        else{
        $definisi=['kode_lembur'=>'required',
                   'besaran_uang'=>'required|numeric|min:0'];
        }

        $sms=['kode_lembur.required'=>'tidak boleh kosong',
               'kode_lembur.unique'=>'data tidak boleh sama',
               'kode_lembur.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',
               'jabatan_id.required'=>'tidak boleh kosong',
               'golongan_id.required'=>'tidak boleh kosong'

               ];

        $kirim=Validator::make(Input::all(),$definisi,$sms);
        if ($kirim->fails()) {
            return redirect('kategori_lembur/'.$cariid->id.'/edit')->withErrors($kirim)->withInput();
        }
        $Update=Request::all();
        $kategori_lembur=kategori_lemburModel::find($id);
        $kategori_lembur->update($Update);
        return redirect('kategori_lembur');
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
        kategori_lemburModel::find($id)->delete();
        return redirect('kategori_lembur');
    }
}
