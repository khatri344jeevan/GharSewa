<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }
    public function manage_users()
    {
        return view('admin.users.create');
    }
}
