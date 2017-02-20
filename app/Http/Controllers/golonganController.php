<?php

namespace App\Http\Controllers;
use App\golonganModel;
use Request;
use Validator;
use Input;
class golonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan=golonganModel::paginate(9);
        return view('golongan.index',compact('golongan'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan=golonganModel::all();
        return view('golongan.create',compact('golongan'));
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

        $definisi=['kode_golongan'=>'required|unique:golongan',
                   'nama_golongan'=>'required',
                   'besaran_uang'=>'required|numeric|min:0'];


        $sms=['kode_golongan.required'=>'tidak boleh kosong',
               'kode_golongan.unique'=>'data tidak boleh sama',
               'nama_golongan.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',

        ];


        $kirim=Validator::make(Input::all(),$definisi,$sms);
        if ($kirim->fails()) {
            return redirect('golongan/create')->withErrors($kirim)->withInput();
        }


        $golongan=Request::all();
        golonganModel::create($golongan);
        return redirect('golongan');
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
        $golongan=golonganModel::find($id);
        return view('golongan.edit',compact('golongan'));
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
        $cariid=golonganModel::find($id);
        if ($cariid->kode_golongan != Request('kode_golongan')) {
            $definisi=['kode_golongan'=>'required|unique:golongan',
           'nama_golongan'=>'required',
           'besaran_uang'=>'required|numeric|min:0'];
        }
        else
        {
            $definisi=['kode_golongan'=>'required',
           'nama_golongan'=>'required',
           'besaran_uang'=>'required|numeric|min:0'];
        }
        $sms=['kode_golongan.required'=>'tidak boleh kosong',
               'kode_golongan.unique'=>'data tidak boleh sama',
               'nama_golongan.required'=>'tidak boleh kosong',
               'besaran_uang.required'=>'tidak boleh kosong',
               'besaran_uang.numeric'=>'input angka',
               'besaran_uang.min'=>'min 0',

        ];
        $validate=Validator::make(Input::all(),$definisi,$sms);
        if ($validate->fails()) {
            return redirect('golongan/'.$cariid->id.'/'.'edit')->withErrors($validate)->withInput();
        }
        $Update=Request::all();
        $golongan=golonganModel::find($id);
        $golongan->update($Update);
        return redirect('golongan');
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
        golonganModel::find($id)->delete();
        return redirect('golongan');
    }
}
