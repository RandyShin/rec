<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cdr;
use Illuminate\Support\Facades\Input;
use DB;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function  getRecording() {
//        $cdrs   = Cdr::limit(20)->get();


        $datefrom = \Request::get('datefrom');
        $dateto = \Request::get('dateto');
        $src = \Request::get('src');
        $dst = \Request::get('dst');
        $disposition = \Request::get('disposition');




//        $qry = DB::table('cdrs')
//            ->where('src', 'like', '%' . $src . '%')
//            ->orderBy('calldate', 'DESC');

        $qry = DB::table('cdrs');



        if (Input::has('datefrom'))
        {
            $qry->where('calldate', '>=', $datefrom. ' 00:00:00');
        }

        if (Input::has('dateto'))
        {
            $qry->where('calldate', '<=', $dateto. ' 23:59:59');
        }

        if (Input::has('src'))
        {
            $qry->where('src','like', '%' . $src . '%');
        }

        if (Input::has('dst'))
        {
            $qry->where('dst','like', '%' . $dst . '%');
        }

        if (Input::has('disposition'))
        {
            $qry->where('disposition','like', '%' . $disposition . '%');
        }





//        if (isset($datefrom) && $datefrom != '') {
//            $qry = DB::table('cdrs')
//                ->where('calldate', '>=', $datefrom. ' 00:00:00')
//                ->get();
//        }
//
//
//        if (isset($dateto) && $dateto != '') {
//            $qry = DB::table('cdrs')
//                ->where('calldate', '<=', $dateto. ' 23:59:59')
//                ->get();
//        }


//        if (isset($src) && $src != '') {
//            $qry = DB::table('cdrs')
//                ->where('src', 'like', '%' . $src . '%')
//                ->get();
//        }




        $count = $qry ->count();




        $cdrs = $qry
            ->orderBy('calldate', 'DESC')
            ->paginate(10);




        return view('pages.recording')
            ->withCdrs($cdrs)
            ->withCount($count);



    }
}