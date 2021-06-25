<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Auth;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
       
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'kk' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'akte' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'skhun' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'ijazah' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $imgname = $request->kk->getClientOriginalName();
        $request->kk->move(public_path('image'), $imgname);
        
        $imgname1 = $request->akte->getClientOriginalName();
        $request->akte->move(public_path('image'), $imgname1);

        $imgname2 = $request->skhun->getClientOriginalName();
        $request->skhun->move(public_path('image'), $imgname2);

        $imgname3 = $request->ijazah->getClientOriginalName();
        $request->ijazah->move(public_path('image'), $imgname3);

        $document = new document();
        $document->nisn = $request->nisn;
        $document->kk = $imgname;
        $document->akte = $imgname1;
        $document->skhun = $imgname2;
        $document->ijazah = $imgname3;
        $document->save();

        return redirect('/document')->with('status', 'Data Berhasil di Tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $data = Document::find()
    //     return view('user.dashboard', compact('id'));
    // }
    public function tampil()
    {
        //$document = Document::find($nisn);
        $document = Document::where('nisn', Auth::user()->nisn )->first();
        
        return view('user.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
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
        $data = Document::where('nisn', Auth::user()->nisn)->first();
        if ($request->kk != NULL) {
            $imgname = $request->kk->getClientOriginalName();
            $request->kk->move(public_path('image'), $imgname);
        }else{
            $imgname = $data->kk;
        }

        if ($request->akte != NULL) {
            $imgname1 = $request->akte->getClientOriginalName();
            $request->akte->move(public_path('image'), $imgname1);
        }else{
            $imgname1 = $data->akte;
        }

        if ($request->skhun != NULL) {
            $imgname2 = $request->skhun->getClientOriginalName();
            $request->skhun->move(public_path('image'), $imgname2);
        }else{
            $imgname2 = $data->skhun;
        }

        if ($request->ijazah != NULL) {
            $imgname3 = $request->ijazah->getClientOriginalName();
            $request->ijazah->move(public_path('image'), $imgname3);
        }else{
            $imgname3 = $data->ijazah;
        }

        $document = Document::find($id)->update([
            'nisn' => $data->nisn,
            'kk' => $imgname,
            'akte' => $imgname1,
            'skhun' => $imgname2,
            'ijazah' => $imgname3,
        ]);
        return redirect('/document');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request->kk);
        $data = Document::where('nisn', Auth::user()->nisn)->first();
        if ($request->kk == NULL) {
            $imgname = $data->kk;
           
        }else{
            $imgname = '';
        }

        if ($request->akte == NULL) {
            $imgname1 = $data->akte;
            
        }else{
            $imgname1 = '';
        }

        if ($request->skhun == NULL) {
            $imgname2 = $data->skhun;
            
        }else{
            $imgname2 = '';
        }

        if ($request->ijazah == NULL) {
            $imgname3 = $data->ijazah;
            
        }else{
            $imgname3 = '';
        }

        $document = Document::find($id)->update([
            'nisn' => $data->nisn,
            'kk' => $imgname,
            'akte' => $imgname1,
            'skhun' => $imgname2,
            'ijazah' => $imgname3,
        ]);
        return redirect('/document')->with('status-danger', 'Data Berhasil dihapus !');;
    }

    public function verifikasi(Request $request, $id)
    {
        $doc = Document::where('id', $id)->first();
        if ($doc == NULL) {
            return redirect('/admin/belum')->with('status-danger', 'Gagal Diverifikasi, Pendaftar Belum Mengirimkan Berkas-Berkas');
        }else{
            $vrf = User::where('id', $id)->update([
                'status' => 'diverifikasi',
                'tanggal_wawancara' => $request->tanggal_wawancara,
            ]);

            if($vrf){
                return redirect('/admin/belum')->with('status', 'Siswa Berhasil Diverifikasi');
            }else {
                return redirect('/admin/belum')->with('status-danger', 'Siswa Gagal Diverifikasi');
            }
        }
    }
}
