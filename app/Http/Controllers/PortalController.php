<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Jenis;
use App\Models\Wisata;
use App\Models\User;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(Request $request)
    {

        return view('pages.portal', [
            'wisata' => Wisata::count(),
            'criterias' => Criteria::count(),
            'jenis' => Jenis::count(),
            'users' => User::count(),
        ]);
    }
}
