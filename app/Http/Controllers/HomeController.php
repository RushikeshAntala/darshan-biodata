<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
use App\Models\UserInfo;


class HomeController extends Controller
{
    //
    public function biodata(Request $request)
    {
        return view('biodata');
    }

    public function saingSheet(Request $request)
    {
        return view('saing-sheet');
    }
}