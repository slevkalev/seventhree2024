<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home() {

        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";

        return redirect('golf');

        // return view('home', [
        //     'today'=>$today,
        //     'currentUser'=>$currentUser
        // ]);

    }
}
