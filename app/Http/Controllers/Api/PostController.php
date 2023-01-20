<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class PostController extends Controller
{
   function index(){
    $data = Karyawan::paginate(10);
    return response()->json($data);
   }

   function create(Request $request){
    $request->validate([
        'nama_karyawan'=>'required',
        'jabatan'=>"required",
        'golongan'=>"required",
        'alamat'=>"required",
        'tempat_lahir'=>"required",
        'tanggal_lahir'=>"required",
        'jenis_kelamin'=>"required",
        'no_hp'=>"required",
    ]);

    $karyawan=new Karyawan;
    $karyawan->nama_karyawan=$request->input('nama_karyawan');
    $karyawan->jabatan=$request->input('jabatan');
    $karyawan->golongan=$request->input('golongan');
    $karyawan->alamat=$request->input('alamat');
    $karyawan->tempat_lahir=$request->input('tempat_lahir');
    $karyawan->tanggal_lahir=$request->input('tanggal_lahir');
    $karyawan->jenis_kelamin=$request->input('jenis_kelamin');
    $karyawan->no_hp=$request->input('no_hp');
    $karyawan->save();
    
    return response()->json(['id'=>$karyawan->id]);
   }

   function update(Request $request,$id){
    $request->validate([
        'nama_karyawan'=>'required',
        'jabatan'=>"required",
        'golongan'=>"required",
        'alamat'=>"required",
        'tempat_lahir'=>"required",
        'tanggal_lahir'=>"required",
        'jenis_kelamin'=>"required",
        'no_hp'=>"required",
    ]);

    $karyawan=Karyawan::findOrFail($id);
    $karyawan->nama_karyawan=$request->input('nama_karyawan');
    $karyawan->jabatan=$request->input('jabatan');
    $karyawan->golongan=$request->input('golongan');
    $karyawan->alamat=$request->input('alamat');
    $karyawan->tempat_lahir=$request->input('tempat_lahir');
    $karyawan->tanggal_lahir=$request->input('tanggal_lahir');
    $karyawan->jenis_kelamin=$request->input('jenis_kelamin');
    $karyawan->no_hp=$request->input('no_hp');
    $karyawan->save();
    
    return response()->json('berhasil');
   }
   function delete($id){
    $karyawan=Karyawan::findOrFail($id);
    $karyawan->delete();    

    return response()->json('berhasil');

   }
}