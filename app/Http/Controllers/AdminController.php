<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use DB;
use Validator;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        if (Auth::user()->role == 'user') {
        
            $data = Document::where('nisn', Auth::user()->nisn )->first();
            return view('user.dashboard', compact('data'));
        }
        else {
            $data = DB::select("select * from users where role='user' AND id != 1");
            // $data = User::where('role', 'user');
            return view('admin.dashboard', compact('data'));
        }
    }
    
    public function profile()
    { 
        return view('profile.show1');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.create');
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

    public function pendaftar()
    {
        $data = User::where('name','!=','admin')->orderBy('name', 'ASC')->get();
        return view('admin.all', compact('data'));
    }
    
    public function diverifikasi()
    {
        $data = User::where('status', 'diverifikasi')->where('name','!=','admin')->orderBy('name', 'ASC')->get();
        return view('admin.diverifikasi', compact('data'));
    }

    public function diterima()
    {
        $data =User::where('status', 'diterima')->where('name','!=','admin')->orderBy('name', 'ASC')->get();
        return view('admin.diterima', compact('data'));
    }

    public function belum()
    {
        $data = User::where('status', 'belum')->where('name','!=','admin')->orderBy('name', 'ASC')->get();
        
        return view('admin.belum', compact('data'));
    }

    public function ditolak()
    {
        $data = DB::select("select * from users where role='user' AND status = 'ditolak' AND name != 'admin' order by name asc");
        return view('admin.ditolak', compact('data'));
    }

    public function terima($id)
    {
        $trm = User::where('id', $id)->update(['status' => 'diterima']);

        if($trm){
            return redirect('/admin/diterima')->with('status', 'Siswa Berhasil Diterima');
        }else {
            return redirect('/admin/diterima')->with('status-danger', 'Siswa Gagal Diterima');
        }
    }
    
    public function batal($id)
    {
        $btl = User::where('id', $id)->update(['status' => 'belum']);

        if($btl){
            return redirect('/admin/belum')->with('status', 'Berhasil Dibatalkan');
        }else {
            return redirect('/admin/belum')->with('status-danger', 'Gagal Membatalkan');
        }
    }

    public function batalkan($id)
    {
        $btlkan = User::where('id', $id)->update([
            'status' => 'belum',
            'tanggal_wawancara' => NULL
            ]);

        if($btlkan){
            return redirect('/admin/belum')->with('status', 'Siswa Berhasil Dibatalkan');
        }else {
            return redirect('/admin/belum')->with('status-danger', 'Gagal Membatalkan Siswa');
        }
    }

    public function tolak(Request $request, $id)
    {
    // dd($id);
        if ($request->catatan == NULL) {
            $tlk = User::where('id', $id)->update([
                'status' => 'ditolak',
            ]);
        }
        else {
            $tlk = User::where('id', $id)->update([
                'status' => 'ditolak',
                'catatan' => $request->catatan,
            ]);
        }

        if($tlk){
            return redirect('/admin/belum')->with('status', 'Siswa Berhasil Ditolak');
        }else {
            return redirect('/admin/belum')->with('status-danger', 'Siswa Gagal Ditolak');
        }
    }


    public function verifikasi(Request $request, $id)
    {
        Validator::make($request->all(), [
            'tanggal_wawancara' => 'after_or_equal:tomorrow',
        ])->validate();

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

    public function detail($nisn)
    {
        $doc = Document::where('nisn', $nisn )->first();
  
        $user = User::where('nisn', $nisn)->first();
        return view('admin.detail',compact('doc','user'));
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
        Document::destroy($id);
        return redirect('/home')->with('status-danger', 'Data Berhasil di Delete !');;
    }
}
