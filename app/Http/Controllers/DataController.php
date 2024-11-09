<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Guru;
use App\Models\Ruangan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Data::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '
                            <a class="btn btn-primary" href="datas/'.$row->id.'/edit" >
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>

                            <a href="datas/'.$row->id.'" class="btn btn-danger" data-confirm-delete="true">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        confirmDelete("Menghapus Data!", "Apakah anda yakin ingin menghapus data ini?");
        return view('datas.index');
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $ruangan = Ruangan::all();
        return view('datas.create', compact('guru', 'siswa','ruangan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'murid' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast('Ups, Ada Sesuatu yang Salah!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Data::create([
                'nama' => $request->nama,
                'murid' => $request->murid,
                'kelas' => $request->kelas,
    
            ]);
            Alert::toast('Data Berhasil Di Buat!', 'success');
            return redirect()->route('datas.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        $ruangan = Ruangan::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('datas.edit', compact('data', 'ruangan','guru','siswa'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'murid' => 'required',
            'kelas' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::toast('Ups, Ada Sesuatu yang Salah!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data->update([
                'nama' => $request->nama,
                'murid' => $request->murid,
                'kelas' => $request->kelas,
                
            ]);
            Alert::toast('Data Berhasil Di Update!', 'success');
            return redirect()->route('datas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $data->delete();

        Alert::toast('Data Berhasil Di Hapus!', 'success');
        return redirect()->route('datas.index');
    }
}
