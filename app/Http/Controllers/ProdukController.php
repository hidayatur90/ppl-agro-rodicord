<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProduksiStockKopi()
    {
        $produk = DB::table('produk')
                ->select('*', DB::raw('SUM(stok) as total_stok'))
                ->groupBy('namaProduk')
                ->get();
        // $date = DB::select('select created_at, updated_at from produk');
        return view('produksi.produksiStockKopi', [
            'produk'=>$produk
        ]);
    }
    public function indexOwnerStockKopi()
    {
        $produk = DB::table('produk')
                ->select('*', DB::raw('SUM(stok) as total_stok'))
                ->groupBy('namaProduk')
                ->get();
        // $date = DB::select('select created_at, updated_at from produk');
        return view('owner.ownerStockKopi', [
            'produk'=>$produk
        ]);
    }
    public function indexKedaiStockKopi()
    {
        $produk = DB::table('produk')
                ->select('*', DB::raw('SUM(stok) as total_stok'))
                ->groupBy('namaProduk')
                ->get();
        // $date = DB::select('select created_at, updated_at from produk');
        return view('kedai.kedaiStockKopi', [
            'produk'=>$produk
        ]);
    }

    public function indexStockKopiDetail($namaProduk)
    {
        // $produk = DB::select('select * from produk where namaProduk = :namaProduk', ['namaProduk' => $namaProduk]);
    	
        $produk = DB::table('produk')
             ->select('*', DB::raw('SUM(stok) as total_stok'))
             ->where('namaProduk', '=',  ['namaProduk' => $namaProduk])
             ->groupBy('kategori')
             ->get();
        
        return view('produksi.stockKopiDetail', [
            'produk'=>$produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStockKopi()
    {
        $produk = DB::select('select DISTINCT(namaProduk) from produk');

    	return view('produksi.stockKopiTambah', [
            'produk'=>$produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStockKopi(Request $request)
    {
        $this->validate($request,[
    		'namaProduk' => 'required',
    		'stok' => 'required|integer',
    		'kategori' => 'required',
    	]);
 
        Produk::create([
    		'namaProduk' => $request->namaProduk,
    		'stok' => $request->stok,
    		'kategori' => $request->kategori,
    	]);

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
    	return redirect('/produksiStockKopi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function editStockKopi($namaProduk, $kategori)
    {
        // $produk = produk::find($namaProduk);
        $produk = DB::table('produk')
            ->select('*', DB::raw('SUM(stok) as total_stok'))
            ->where([
                ['namaProduk', '=',  ['namaProduk' => $namaProduk]],
                ['kategori', '=',  ['kategori' => $kategori]]
            ])
            ->groupBy('kategori')
            ->get();
        return view('produksi.stockKopiEdit', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function updateStockKopi($namaProduk, Request $request)
    {
        $this->validate($request,[
    		'kategori' => 'required',
    		'stok' => 'required|integer',
            'kategori'=> 'required'
    	]);
 
        $produk = Produk::find($namaProduk);
        $produk->kategori = $request->kategori;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
    	return redirect('/produksiStockKopi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
