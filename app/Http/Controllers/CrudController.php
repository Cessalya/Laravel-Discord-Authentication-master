<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CrudController extends Controller
{
    public function index(){

        $data = Crud::all();
        return view ('crud', compact('data'));
    }

    public function Crudtambah(){
        return view('Crudtambah');
       
    }

    public function crudinsert(Request $request){
        // dd($request->all());
        Crud::create($request->all());


        Http::post('https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf', [
            'content' => "New Product",
            'embeds' => [
                [
                    'title' => "New Product",
                    'description' => 'Nama Barang : '.$request->namabarang. 'Kode Barang :'.$request->kodebarang. 'Jumlah Barang :' .$request->jumlahbarang,
                    'color' => '7506394',
                ]
            ],
        ]);

        
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
      

    }

    public function tampilkandata($id){
        $data = Crud::find($id);
        // dd($data);

        return view('crudtampil', compact('data'));

    }

    public function updatedata(Request $request, $id){
        $data = Crud::find($id);
        $data->update($request->all());
        Http::post('https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf', [
            'content' => "Product Update",
            'embeds' => [
                [
                    'title' => "Product Update",
                    'description' => 'Nama Barang : '.$request->namabarang. 'Kode Barang :'.$request->kodebarang. ' Jumlah Barang : ' .$request->jumlahbarang,
                    'color' => '7506394',
                ]
            ],
        ]);
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
        

    }

    public function delete($id){
        $data = Crud::find($id);
        Http::post('https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf', [
            'content' => "Data Deleted",
            'embeds' => [
                [
                    'title' => "Data Deleted",
                    'description' => 'Nama Barang : '.$data->namabarang. ' Telah Di Hapus : ' ,
                    'color' => '7506394',
                ]
            ],
        ]);
        $data->delete();
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
    }
    
    public function postToDiscord(Request $request, $id)
{
    $data = array("cruds" => "cruds", "Discord" => "Webhooks");
    $curl = curl_init("https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}
}