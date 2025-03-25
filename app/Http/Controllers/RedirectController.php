<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole(['admin', 'superadmin'])) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/');
        }
    }
}
