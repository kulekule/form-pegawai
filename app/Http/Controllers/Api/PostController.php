<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    function index()
    {
        $data = Karyawan::paginate(10);
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = Karyawan::find($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'jabatan' => "required",
            'golongan' => "required",
            'alamat' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir' => "required",
            'jenis_kelamin' => "required",
            'no_hp' => "required",
        ]);

        $karyawan = new Karyawan;
        $karyawan->nama_karyawan = $request->input('nama_karyawan');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->golongan = $request->input('golongan');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->tempat_lahir = $request->input('tempat_lahir');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->no_hp = $request->input('no_hp');
        $karyawan->save();

        return response()->json(['id' => $karyawan->id]);
    }

    // function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_karyawan' => 'required',
    //         'jabatan' => "required",
    //         'golongan' => "required",
    //         'alamat' => "required",
    //         'tempat_lahir' => "required",
    //         'tanggal_lahir' => "required",
    //         'jenis_kelamin' => "required",
    //         'no_hp' => "required",
    //     ]);

    //     $karyawan = Karyawan::find($id);

    //     $karyawan->nama_karyawan = $request->input('nama_karyawan');
    //     $karyawan->jabatan = $request->input('jabatan');
    //     $karyawan->golongan = $request->input('golongan');
    //     $karyawan->alamat = $request->input('alamat');
    //     $karyawan->tempat_lahir = $request->input('tempat_lahir');
    //     $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
    //     $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
    //     $karyawan->no_hp = $request->input('no_hp');
    //     $karyawan->save();

    //     return response()->json('berhasil');
    // }


    public function update($id, Request $request)
    {
        $input = $request->all();
        $data = Karyawan::find($id);

        // $validator = Validator::make($input, [
        //     'nama_karyawan' => 'required',
        //     'jabatan' => "required",
        //     'golongan' => "required",
        //     'alamat' => "required",
        //     'tempat_lahir' => "required",
        //     'tanggal_lahir' => "required",
        //     'jenis_kelamin' => "required",
        //     'no_hp' => "required",
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        $data->nama_karyawan = $input['nama_karyawan'];
        $data->jabatan = $input['jabatan'];
        $data->golongan = $input['golongan'];
        $data->alamat = $input['alamat'];
        $data->tempat_lahir = $input['tempat_lahir'];
        $data->tanggal_lahir = $input['tanggal_lahir'];
        $data->jenis_kelamin = $input['jenis_kelamin'];
        $data->no_hp = $input['no_hp'];
        $data->save();
        return response()->json([
            "success" => true,
            "message" => "Berhasil.",
            "data" => $data
        ]);
    }

    public function delete($id)
    {
        $data = Karyawan::find($id);
        $data->delete();

        return response()->json('berhasil');
    }
}
