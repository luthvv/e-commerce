<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Inventaris_history;

class InventarisController extends Controller
{
    public $table = "Inventaris_history";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Access');
    }

    public function create(Request $request)
    {
        $tipe = $request->input('tipe');
        $nama = $request->input('nama');
        $tanggal_pembelian = $request->input('tanggal_pembelian');
        $harga = $request->input('harga');
        $supplier = $request->input('supplier');
        $pemegang = $request->input('pemegang');
        $lokasi = $request->input('lokasi');
        $status = $request->input('status');
        $image_url = $request->input('image_url');
        $image_title = $request->input('image_title');


        $new = Inventaris::create([
            'tipe' => $tipe,
            'nama' => $nama,
            'tanggal_pembelian' => $tanggal_pembelian,
            'harga' => $harga,
            'supplier' => $supplier,
            'pemegang' => $pemegang,
            'lokasi' => $lokasi,
            'status' => $status,
            'image_url' => $image_url,
            'image_title' => $image_title,
        ]);

        if($new){
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dibuat',
                'data' => $new
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal dibuat',
                'data' => ''
            ], 201);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');

        $barang = Inventaris::where('id', $id)->first();

        if($barang){
        $new_history = Inventaris_history::create([
            'id_barang' => $barang->value('id'),
            'pemegang' => $barang->value('pemegang'),
            'lokasi' => $barang->value('lokasi'),
            'supplier' => $barang->value('supplier'),
            'status' => $barang->value('status'),
            'image_url' => $barang->value('image_url'),
            'image_title' => $barang->value('image_title'),
            'pengedit' =>  $request->input('pengedit'),
        ]);

        if($new_history){
            $barang -> update([
                'tipe' => $request->input('tipe', 'test'),
                'nama' => $request->input('nama'),
                'tanggal_pembelian' => $request->input('tanggal_pembelian', 'test'),
                'harga' => $request->input('harga', 'test'),
                'supplier' => $request->input('supplier', 'test'),
                'pemegang' => $request->input('pemegang', 'test'),
                'lokasi' => $request->input('lokasi', 'test'),
                'status' => $request->input('status', 'test'),
                'image_url' => $request->input('image_url', 'test'),
                'image_title' => $request->input('image_title', 'test'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'data berhasil di update',
                'data' => [
                    'update' => $barang,
                    'history' => $new_history
                ]
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal di update',
                'data' => ''
            ], 201);
        }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
                'data' => ''
            ], 201);
        }

        // foreach($age as $x => $val) {
        //     echo "$x = $val<br>";
        //   }

        // return $update;
        // foreach($update as $x => $val) {
        //    return $history = $val;
        //   };
    }

    public function delete($id)
    {
        $inventaris = Inventaris::find($id);

        if($inventaris){
            $inventaris->delete();

            return response()->json([
                'success' => true,
                'message' => 'berhasil menghapus'
            ], 200);
        };
    }

    public function getInventaris($id)
    {
        $inventaris = Inventaris::find($id);

        $history = Inventaris_history::where('id_barang', $id)->get();

        if($inventaris && $history){
            return response()->json([
                 'success'=> true,
                 'message'=>'data found',
                 'data' => [
                    'inventaris' => $inventaris,
                    'history' => $history
                 ]
             ],200);
        } else {
            return response()->json([
                'success'=> false,
                'message'=>'data not found',
                'data' => ''
            ],200);
        }
    }

    public function getAll($type = 'none')
    {
        $inventarisType = Inventaris::where('tipe', $type)->get();
        $inventaris = Inventaris::get();

        if($type != 'none' && $inventarisType){
            return response()->json([
                 'success'=> true,
                 'message'=>'data type found',
                 'data' => $inventarisType,
             ],200);
        } else {
            return response()->json([
                'success'=> true,
                'message'=>'all data found',
                'data' => $inventaris,
            ],200);
        }
    }


}
