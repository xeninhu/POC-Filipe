<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Checkpoint;

class ReportController extends Controller
{
    public function report(Request $request) {
        $sites = Site::all();
        return view('report',["sites"=>$sites]);
    }
}
