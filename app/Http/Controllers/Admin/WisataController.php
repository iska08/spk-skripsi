<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WisatasExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WisataRequest;
use App\Http\Requests\Admin\WisataUpdateRequest;
use App\Imports\WisatasImport;
use App\Models\Jenis;
use App\Models\Wisata;
use Maatwebsite\Excel\Facades\Excel;
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
    public function update(WisataUpdateRequest $request, Wisata $wisata)
    {
        $validatedData = $request->validated();
        Wisata::where('id', $wisata->id)->update($validatedData);
        return redirect('/dashboard/wisata')->with('success', 'Destinasi Wisata yang Dipilih Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        Wisata::destroy($wisata->id);
        return redirect('/dashboard/wisata')->with('success', 'Destinasi Wisata yang Dipilih Telah Dihapus!');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file')->store('temp');
        try {
            $import = new WisatasImport;
            $import->import($file);
            if ('jenis_name' === null) {
                dd($import->errors());
            } else {
                return redirect('/dashboard/wisata')->with('success', 'Berkas Destinasi Wisata Berhasil Diimport!');
            }
            dd($import);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function export()
    {
        return Excel::download(new WisatasExport(), 'Data Destinasi Wisata.xlsx');
    }
}