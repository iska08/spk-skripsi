<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Jenis;
use App\Models\Wisata;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'wisata' => Wisata::count(),
            'criterias' => Criteria::count(),
            'jenis' => Jenis::count(),
            'users' => User::count(),
        ]);
    }
}
