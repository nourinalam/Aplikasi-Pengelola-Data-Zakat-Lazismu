<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\JenisMustahiq;
use App\Mustahiq;
use Response;

class MustahiqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jenises = JenisMustahiq::all();
        return view('mustahiq.mustahiq', compact('jenises'));
    }

    public function showJenis()
    {
        $jenises = JenisMustahiq::all();
        
        return view('mustahiq.jenis-mustahiq', compact('jenises'));
    }

    public function getJenis($id)
    {
        $hasil = JenisMustahiq::findOrfail($id);
        return Response::json($hasil);
    }

    public function updateJenis($id)
    {
        $jenis = JenisMustahiq::findOrfail($id);
        $jenis->jenis = request('jenis');
        $jenis->keterangan = request('keterangan');
        $jenis->jumlah_bagian = request('jumlah_bagian');
        $jenis->save();
        
        return redirect()->back()->withSuccess('Jenis Mustahiq '.$jenis->jenis.' Berhasil Dirubah');
    }

    public function getMustahiqData()
    {
        $mustahiqs = Mustahiq::select(['mustahiqs.id','mustahiqs.name as nama', 'mustahiqs.area', 'jenis_mustahiqs.jenis'])
            ->join('jenis_mustahiqs', 'mustahiqs.jenismustahiq_id', '=', 'jenis_mustahiqs.id')
            ->orderBy('mustahiqs.id');

        return Datatables::of($mustahiqs)
            ->addColumn('action', function ($mustahiqs) {
                return '<a title="Rubah Data" id="edit"  data-toggle="modal" data-target="#editModal" name="'.base64_encode($mustahiqs->id).'" class="btn btn-xs btn-primary" ><i class="material-icons">border_color</i></a>'
                    .'<a title="Hapus Data" id="apus" data-value="'.base64_encode($mustahiqs->id).'" class="btn btn-xs btn-danger" ><i class="material-icons">delete</i></a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public  function destroy($id)
    {
        $idmustahiq = base64_decode($id);
        $mustahiq = Mustahiq::findOrfail($idmustahiq);
        $mustahiq->delete();

        // return redirect()->route('mustahiq')->withSuccess('Data Mustahiq '.$mustahiq->name.' Berhasil Dihapus');
    }

    public function storeMustahiq(Request $request)
    {
        Mustahiq::create([
            'name' => $request->name,
            'area' => $request->area,
            'jenismustahiq_id' => $request->jenismustahiq_id
        ]);
        
        return redirect()->back()->withSuccess('Data Mustahiq Berhasil Ditambah');
    }

    public function getMustahiq($idm)
    {
        $id = base64_decode($idm);
        $hasil = Mustahiq::findOrfail($id);
        return Response::json($hasil);
    }

    public function updateMustahiq(Request $request)
    {
        $Mustahiq = Mustahiq::findOrfail(request('_id'));
        $Mustahiq->name = request('name');
        $Mustahiq->area = request('area');
        $Mustahiq->jenismustahiq_id = request('jenismustahiq_id');
        $Mustahiq->save();

        return redirect()->back()->withSuccess('Data Mustahiq '.$Mustahiq->name.' Berhasil Dirubah');
    }
}
