<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class CrudController extends Controller
{
    public function index(){

        $data = Crud::all();
        return view ('crud', compact('data'));
        $curl = curl_init("https://discord.com/api/webhooks/1003867953063800892/UGEgLffPSFWvGkUdiSqLYxl_gbHjmX7PR634hIcWyHWCUvt05THSIpmClFJmJ2PF2sr4");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }

    public function Crudtambah(){
        return view('Crudtambah');
        $curl = curl_init("https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }

    public function crudinsert(Request $request){
        // dd($request->all());
        Crud::create($request->all());
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
        // $curl = curl_init("https://discord.com/api/webhooks/1003867953063800892/UGEgLffPSFWvGkUdiSqLYxl_gbHjmX7PR634hIcWyHWCUvt05THSIpmClFJmJ2PF2sr4");
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // return curl_exec($curl);

    }

    public function tampilkandata($id){
        $data = Crud::find($id);
        // dd($data);

        return view('crudtampil', compact('data'));

    }

    public function updatedata(Request $request, $id){
        $data = Crud::find($id);
        $data->update($request->all());
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
        

    }

    public function delete($id){
        $data = Crud::find($id);
        $data->delete();
        return redirect()->route('cruds')->with('success','Data berhasil ditambahkan');
    }
    
    public function postToDiscord(Post $post)
{
    $data = array("cruds" => "cruds", "Discord" => "Webhooks");
    $curl = curl_init("https://discord.com/api/webhooks/1003913034990899310/6H7VBilYmc-ms3b9_Il7mD_kYbPKvuGCccIv2jp2_dhki963euwiwGw4RC7mAs0bfUwf");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}
}