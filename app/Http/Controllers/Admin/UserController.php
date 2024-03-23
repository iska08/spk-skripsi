<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        return view('pages.admin.user.data', [
            'title' => 'Data Pengguna',
            'users' => User::whereNot('id', auth()->user()->id)->get()
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
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        return view('pages.admin.user.create', [
            'title' => 'Tambah Pengguna',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        $validate = $request->validated();
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        return redirect('/dashboard/users')->with('success', 'Pengguna Baru Telah Ditambahkan!');
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
    public function edit(User $user)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        return view('pages.admin.user.edit', [
            'title' => 'Edit Pengguna',
            'user'  => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (auth()->user()->level !== 'ADMIN') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        $validate = $request->validated();
        if ($validate['password'] ?? false) {
            $validate['password'] = Hash::make($validate['password']);
        }
        User::where('id', $user->id)->update($validate);
        return redirect('/dashboard/users')->with('success', 'Pengguna yang Dipilih Telah Dihapus!');
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
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        $jenis = User::findOrFail($id);
        $jenis->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna yang Dipilih Telah Dihapus!');
    }
}