<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cdr;
use Illuminate\Support\Facades\Input;



class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function  getRecording() {
//        $cdrs   = Cdr::limit(20)->get();





        $src = \Request::get('src');
        $dst = \Request::get('dst');


//        $cdrs = Cdr::where('src','like','%'.$search.'%')
//            ->orwhere('dst', 'like', '%'.$search.'%')
//            ->orderby('calldate', 'desc')
//            ->paginate(10);


        $cdrs = Cdr::where('src','like','%'.$src.'%')
            ->where('dst', 'like', '%'.$dst.'%')
            ->orderby('calldate', 'desc')
            ->paginate(10);


        $count = Cdr::where('src','like','%'.$src.'%')
            ->where('dst', 'like', '%'.$dst.'%')
            ->count();


        return view('pages.recording')
            ->withCdrs($cdrs)
            ->withCount($count);


    }

}

