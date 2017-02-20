<?php

namespace App\Http\Controllers;
use App\tunjanganModel;
use Request;
use App\jabatanModel;
use App\golonganModel;

class tunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan=tunjanganModel::all();
        return view('tunjangan.index',compact('tunjangan'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=jabatanModel::all();
        $golongan=golonganModel::all();
        $tunjangan=tunjanganModel::all();
        return view('tunjangan.create',compact('tunjangan','golongan','jabatan'));
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
        $tunjangan=Request::all();
        tunjanganModel::create($tunjangan);
        return redirect('tunjangan');
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
        $tunjangan=tunjanganModel::all();
        return view('tunjangan.edit',compact('tunjangan'));
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
        $tunjangan=tunjanganModel::find($id);
        $tunjangan->update($Update);
        return redirect('tunjangan');
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
        tunjanganModel::find($id)->delete();
        return redirect('tunjangan');
    }
}