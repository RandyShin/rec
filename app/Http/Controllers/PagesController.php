<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cdr;

class PagesController extends Controller
{
    public function  getRecording() {
        $cdrs   = Cdr::orderBy('calldate', 'desc')->paginate('15');

        $count  = Cdr::count();

        return view('pages.recording')->withCdrs($cdrs)->withCount($count);
    }

    public function countDecrement($count)
    {
        static::decrement('count',1);
    }

}
