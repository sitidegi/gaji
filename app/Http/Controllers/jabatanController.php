<?php

namespace App\Http\Controllers;
use App\jabatanModel;
use Request;
use Validator;
use Input;
class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan=jabatanModel::paginate(2);
        return view('jabatan.index',compact('jabatan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=jabatanModel::all();
        return view('jabatan.create',compact('jabatan'));
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

        $definisi=['kode_jabatan'=>'required|unique:jabatan',
                   'nama_jabatan'=>'required',
                   'besaran_uang'=>'required|numeric|min:0'];


        $sms=['kode_jabatan.required'=>'tidak boleh kosong',
               'kode_jabatan.unique'=>'data tidak boleh sama',
               'nama_jabatan.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',

               ];

        $kirim=Validator::make(Input::all(),$definisi,$sms);
        if ($kirim->fails()) {
            return redirect('jabatan/create')->withErrors($kirim)->withInput();
        }
       $jabatan=Request::all();
        jabatanModel::create($jabatan);
        return redirect('jabatan');
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

        $jabatan=jabatanModel::find($id);
        return view('jabatan.edit',compact('jabatan'));
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
        $cariid=jabatanModel::find($id);
        if ($cariid->kode_jabatan != Request('kode_jabatan')) {
            
         $definisi=['kode_jabatan'=>'required|unique:jabatan',
                   'nama_jabatan'=>'required',
                   'besaran_uang'=>'required|numeric|min:0'];
        }
        else{
         $definisi=['kode_jabatan'=>'required',
                   'nama_jabatan'=>'required',
                   'besaran_uang'=>'required|numeric|min:0'];
        }


        $sms=['kode_jabatan.required'=>'tidak boleh kosong',
               'kode_jabatan.unique'=>'data tidak boleh sama',
               'nama_jabatan.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',

               ];

        $kirim=Validator::make(Input::all(),$definisi,$sms);
        if ($kirim->fails()) {
            return redirect('jabatan/'.$cariid->id.'/edit')->withErrors($kirim)->withInput();
        }
        $dataUpdate=Request::all();
        $jabatan=jabatanModel::find($id);
        $jabatan->update($dataUpdate);
        return redirect('jabatan');
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
        jabatanModel::find($id)->delete();
        return redirect('jabatan');
    }
}
