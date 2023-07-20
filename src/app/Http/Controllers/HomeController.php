<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\JenisZakat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = DB::table('transaksis')->whereYear('created_at', date('Y'))
                    ->selectRaw("SUM(jiwa) AS Jiwa, SUM(beras_fitrah) AS Beras, SUM(uang_fitrah) AS Uang, SUM(fidyah) AS Fidyah, SUM(zakat_maal) AS Maal, SUM(infaq) AS Infaq")
                    ->whereNull('deleted_at')
                    ->first();

        $jenis = JenisZakat::select('id','jenis')->orderBy('id', 'DESC')->take(4)->get();

        $jenispopuler = DB::table('transaksis')
                        ->selectRaw('( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=1 AND deleted_at IS NULL) AS beras, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=2 AND deleted_at IS NULL) AS maal, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=3 AND deleted_at IS NULL ) AS zakatmal, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=4 AND deleted_at IS NULL ) AS infaq')
                        ->groupBy('jeniszakat_id')
                        ->where(\DB::raw('DATE_FORMAT(transaksis.created_at, "%Y")'), '=', date('Y'))
                        ->first();

        return view('home', compact('report','jenispopuler','jenis'));
    }
}
