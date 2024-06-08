<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.dashboard', compact('types','technologies'));
    }
}
