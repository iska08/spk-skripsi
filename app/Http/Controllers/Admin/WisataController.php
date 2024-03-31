<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WisataRequest;
use App\Http\Requests\Admin\WisataUpdateRequest;
use App\Models\Jenis;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    // pagination
    protected $limit = 10;
    protected $fields = array('wisatas.*');

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // mengurutkan
        $wisatas = Wisata::orderby('nama_wisata');
        if (request('search')) {
            $wisatas->join('jenis', 'jenis.id', '=', 'wisatas.jenis_id')
                ->where('wisatas.nama_wisata', 'LIKE', '%' . request('search') . '%')
                ->orWhere('wisatas.biaya', 'LIKE', '%' . request('search') . '%')
                ->orWhere('jenis.jenis_name', 'LIKE', '%' . request('search') . '%')
                ->get();
        }
        // Get value halaman yang dipilih dari dropdown
        $page = $request->query('page', 1);
        // Tetapkan opsi dropdown halaman yang diinginkan
        $perPageOptions = [5, 10, 15, 20, 25];
        // Get value halaman yang dipilih menggunaakan the query parameters
        $perPage = $request->query('perPage', $perPageOptions[1]);
        // Paginasi hasil dengan halaman dan dropdown yang dipilih
        $wisatas = $wisatas->paginate($perPage, $this->fields, 'page', $page);
        return view('pages.admin.wisata.data', [
            'title'          => 'Data Destinasi Wisata',
            'wisatas'        => $wisatas,
            'perPageOptions' => $perPageOptions,
            'perPage'        => $perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $jenises = Jenis::orderBy('jenis_name')->get();
        return view('pages.admin.wisata.create', [
            'title'   => 'Tambah Data Destinasi Wisata',
            'jenises' => $jenises,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WisataRequest $request)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        Wisata::create($validatedData);
        return redirect('/dashboard/wisata')->with('success', 'Destinasi Wisata Baru Telah Ditambahkan!');
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
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $wisata = Wisata::FindOrFail($id);
        $jenises = Jenis::orderBy('jenis_name')->get();
        return view('pages.admin.wisata.edit', [
            'title'   => "Edit Data $wisata->nama_wisata",
            'wisata'  => $wisata,
            'jenises' => $jenises
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WisataUpdateRequest $request, $id)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $validatedData = $request->validated();
        $item = Wisata::findOrFail($id);
        $item->update($validatedData);
        return redirect('/dashboard/wisata')->with('success', 'Destinasi Wisata yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Ijin Untuk Melakukan Tindakan Ini.');
        }

        $wisata = Wisata::findOrFail($id);
        $wisata->delete();
        return redirect('/dashboard/wisata')->with('success', 'Destinasi Wisata yang Dipilih Telah Dihapus!');
    }
}