<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\JenisMustahiq;
use App\Mustahiq;
use Response;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenises = Mustahiq::all();
        return view('pengeluaran.index', compact('jenises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengeluaran::create([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->withSuccess('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pengeluarans = Pengeluaran::select(['pengeluarans.id','users.name as nama', 'pengeluarans.jumlah', 'pengeluarans.keterangan'])
            ->join('users', 'pengeluarans.user_id', '=', 'users.id')
            ->orderBy('pengeluarans.id');

        return DataTables::of($pengeluarans)
            ->addColumn('action', function ($pengeluarans) {
                return '<a title="Rubah Pengeluaran" class="btn btn-xs btn-primary" id="'.base64_encode($pengeluarans->id).'"  data-toggle="modal" data-target="#updateModal"><i class="material-icons">border_color</i></a>'
                    .'<a title="Hapus Data" id="apus" data-value="'.base64_encode($pengeluarans->id).'" class="btn btn-xs btn-danger" ><i class="material-icons">delete</i></a>';
            })
            ->addColumn('jumlah', function ($pengeluarans) {
                if ($pengeluarans->jumlah >= 1000){
                return 'Rp. '.number_format($pengeluarans->jumlah,0,'',',');
                }else{
                return $pengeluarans->jumlah .' Liter';
                }
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idpengeluaran = base64_decode($id);
        $pengeluaran = Pengeluaran::findOrfail($idpengeluaran);

        return $pengeluaran;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $idpengeluaran = base64_decode($id);
        $pengeluaran = Pengeluaran::findOrfail($id);
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->save();

        return redirect()->back()->withSuccess('Data Pengeluaran Untuk '.$pengeluaran->keterangan.' Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idpengeluaran = base64_decode($id);
        $pengeluaran = Pengeluaran::findOrfail($idpengeluaran);
        $pengeluaran->delete();
    }
}
