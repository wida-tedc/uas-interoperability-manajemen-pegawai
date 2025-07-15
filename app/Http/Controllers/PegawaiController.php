<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Bidang;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::with(['jabatan', 'bidang'])->get();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Pegawai::with(['jabatan', 'bidang'])->find($id);
        if (!$data) {
            return response()->json(['message' => 'Pegawai tidak ditemukan'], 404);
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required|unique:pegawai',
            'jabatan_id' => 'required|exists:jabatan,id',
            'bidang_id' => 'required|exists:bidang,id',
        ]);

        $data = Pegawai::create($request->all());
        return response()->json(['message' => 'Data pegawai ditambahkan', 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Pegawai::find($id);
        if (!$data) {
            return response()->json(['message' => 'Pegawai tidak ditemukan'], 404);
        }

        $data->update($request->all());
        return response()->json(['message' => 'Data pegawai diperbarui', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Pegawai::find($id);
        if (!$data) {
            return response()->json(['message' => 'Pegawai tidak ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Data pegawai dihapus']);
    }
}
