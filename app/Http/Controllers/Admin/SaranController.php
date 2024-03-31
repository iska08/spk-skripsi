<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use App\Models\User;
use App\Http\Requests\Admin\SaranRequest;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level === 'ADMIN') {
            $sarans = Saran::join('users', 'sarans.user_id', '=', 'users.id')
                ->select('sarans.*', 'users.name', 'users.username')
                ->orderBy('sarans.created_at', 'desc')
                ->get();
        } else {
            // Jika pengguna adalah user, ambil data saran yang dibuat oleh pengguna tersebut
            $sarans = Saran::join('users', 'sarans.user_id', '=', 'users.id')
                ->select('sarans.*', 'users.name', 'users.username')
                ->where('sarans.user_id', auth()->user()->id)
                ->orderBy('sarans.created_at', 'desc')
                ->get();
        }
        return view('pages.admin.saran.data', [
            'title'     => 'Saran Destinasi Wisata',
            'sarans'    => $sarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== 'USER') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        return view('pages.admin.saran.create', [
            'title' => 'Tambah Saran Destinasi Wisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaranRequest $request)
    {
        $saran              = new Saran();
        $saran->user_id     = auth()->user()->id;
        $saran->nama_saran  = $request->nama_saran;
        $saran->keterangan  = $request->keterangan;
        $saran->validasi    = $request->validasi;
        $saran->save();

        return redirect('/dashboard/sarans')->with('success', 'Saran Destinasi Wisata Berhasil Ditambahkan.');
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
        $saran      = Saran::findOrFail($id);
        $userLevel  = auth()->user()->level;
        
        if ($userLevel === 'ADMIN') {
            $title = 'Validasi Saran Destinasi Wisata';
        } elseif($userLevel === 'USER') {
            $title = 'Edit Saran Destinasi Wisata';
        }

        return view('pages.admin.saran.edit', [
            'title' => $title,
            'saran' => $saran
        ]);
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
        $saran              = Saran::findOrFail($id);
        $saran->nama_saran  = $request->nama_saran;
        $saran->keterangan  = $request->keterangan;
        $saran->validasi    = $request->validasi;
        $saran->save();

        return redirect('/dashboard/sarans')->with('success', 'Saran Destinasi Wisata Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return redirect('/dashboard/sarans')->with('success', 'Saran Destinasi Wisata Berhasil Dihapus.');
    }
}
