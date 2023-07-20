<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Transaksi;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.report-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tanggalReport = $request->tanggal_report;
       
        $report = DB::table('transaksis')->whereDate('created_at', $request->tanggal_report)
        ->selectRaw("SUM(jiwa) AS Jiwa, SUM(beras_fitrah) AS Beras, SUM(uang_fitrah) AS Uang, SUM(fidyah) AS Fidyah, SUM(zakat_maal) AS Maal, SUM(infaq) AS Infaq")
        ->whereNull('deleted_at')
        ->first();
        
        return view('report.report-template',compact('report','tanggalReport'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = DB::table('transaksis')->whereYear('created_at', date('Y'))
        ->selectRaw("SUM(jiwa) AS Jiwa, SUM(beras_fitrah) AS Beras, SUM(uang_fitrah) AS Uang, SUM(fidyah) AS Fidyah, SUM(zakat_maal) AS Maal, SUM(infaq) AS Infaq")
        ->first();
        
        return view('report.general-report',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
