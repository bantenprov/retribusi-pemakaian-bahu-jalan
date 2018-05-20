<?php 

namespace Bantenprov\PemakaianBahuJalan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PemakaianBahuJalan\Facades\Tarif;
use Bantenprov\PemakaianBahuJalan\Models\TarifModel;
use Bantenprov\MasterTarif\Models\MasterTarifModel;
use Ramsey\Uuid\Uuid;

class TarifController extends Controller 
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $tarifs = TarifModel::all();
    return view('pemakaian-bahu-jalan::index',compact('tarifs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //$mastertarifs = MasterTarifModel::where('levelunker', '=', 1)->get();
    $mastertarifs = MasterTarifModel::all();
    return view('pemakaian-bahu-jalan::create',compact('mastertarifs')); 
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    //$daftar_retribusi = TarifModel::find($request->daftar_retribusi_id);
    $request->validate([            
        'uraian'                => 'required',
        'wilayah_kota'          => 'required',
        'wilayah_kabupaten'     => 'required',
        'satuan'                => 'required',
        'master_tarif_id'       => 'required',        
    ]);

    /*
    if(is_null($daftar_retribusi)){
        return redirect()->back()->withErrors('Error : retribusi yang dipilih tidak ditemukan');
    }
    */

    // if($request->status > 1 && $request->status < 0){
    //     return redirect()->back()->withErrors('Error : status salah');
    // }
    if($request->tarif == 'on'){
      $tarif  = 0;
    }else{
      $tarif  = 1;
    }

    TarifModel::create([
        'uuid'                  => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
        'uraian'                => $request->uraian,
        'tarif'                 => $tarif,
        'wilayah_kota'          => $request->wilayah_kota,
        'wilayah_kabupaten'     => $request->wilayah_kabupaten,
        'satuan'                => $request->satuan,
        'master_tarif_id'       => $request->master_tarif_id,
        'user_id'               => \Auth::user()->id,
        'user_update'           => \Auth::user()->id,
    ]);
    $request->session()->flash('message', 'Successfully add new data');
    return redirect()->route('tarif.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $tarif = TarifModel::find($id);
    $mastertarifs = MasterTarifModel::all();    
    return view('pemakaian-bahu-jalan::edit', compact('tarif','mastertarifs'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([            
      'uraian'                => 'required',
      'wilayah_kota'          => 'required',
      'wilayah_kabupaten'     => 'required',
      'satuan'                => 'required',
      'master_tarif_id'       => 'required',        
    ]);
  
    if($request->tarif == 'on'){
      $tarif  = 1;
    }else{
      $tarif  = 0;
    }
    TarifModel::find($id)->update([            
        'uuid'                  => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
        'uraian'                => $request->uraian,
        'tarif'                 => $tarif,
        'wilayah_kota'          => $request->wilayah_kota,
        'wilayah_kabupaten'     => $request->wilayah_kabupaten,
        'satuan'                => $request->satuan,
        'master_tarif_id'       => $request->master_tarif_id,
        'user_id'               => \Auth::user()->id,
        'user_update'           => \Auth::user()->id,
    ]);
    $request->session()->flash('message', 'Successfully add new data');
    return redirect()->route('tarif.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    TarifModel::find($id)->delete();
    $request->session()->flash('message', 'Successfully delete data');
    return redirect()->route('tarif.index');
  }
  
}

?>