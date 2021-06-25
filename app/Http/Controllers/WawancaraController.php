<?php

namespace App\Http\Controllers;

use App\Models\Wawancara;
use App\Models\User;
use Illuminate\Http\Request;

class WawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::find($id);
        return view('admin.wawancara', compact('data'));
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
    public function store(Request $request, $id)
    {
        $wawancara = Wawancara::create([
            'nisn' => $request->nisn,
            'pertanyaan1' => $request->pertanyaan1,
            'pertanyaan2' => $request->pertanyaan2,
            'pertanyaan3' => $request->pertanyaan3,
            'pertanyaan4' => $request->pertanyaan4,
            'pertanyaan5' => $request->pertanyaan5,
            'pertanyaan6' => $request->pertanyaan6,
            'pertanyaan7' => $request->pertanyaan7,
            'pertanyaan8' => $request->pertanyaan8,
            'pertanyaan9' => $request->pertanyaan9,   
            'pertanyaan1_ortu' => $request->pertanyaan1_ortu,   
            'pertanyaan2_ortu' => $request->pertanyaan2_ortu,   
            'pertanyaan3_ortu' => $request->pertanyaan3_ortu,   
            'pertanyaan4_ortu' => $request->pertanyaan4_ortu,   
            'pertanyaan5_ortu' => $request->pertanyaan5_ortu,   
            'pertanyaan6_ortu' => $request->pertanyaan6_ortu,   
            'pertanyaan7_ortu' => $request->pertanyaan7_ortu,   
            'pertanyaan8_ortu' => $request->pertanyaan8_ortu,   
        ]);
        return redirect()->route('diverifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function show(Wawancara $wawancara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function edit(Wawancara $wawancara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wawancara $wawancara)
    {
        $wawancara->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wawancara $wawancara)
    {
        //
    }
}
