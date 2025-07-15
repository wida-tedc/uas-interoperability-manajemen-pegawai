<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    // GET /jabatan
    public function index()
    {
        return response()->json(Jabatan::all());
    }

    // GET /jabatan/{id}
    public function show($id)
    {
        $data = Jabatan::find($id);
        if (!$data) {
            return response()->json(['message' => 'Jabatan tidak ditemukan'], 404);
        }
        return response()->json($data);
    }

    // POST /jabatan
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $data = Jabatan::create($request->all());
        return response()->json(['message' => 'Jabatan ditambahkan', 'data' => $data]);
    }

    // PUT /jabatan/{id}
    public function update(Request $request, $id)
    {
        $data = Jabatan::find($id);
        if (!$data) {
            return response()->json(['message' => 'Jabatan tidak ditemukan'], 404);
        }

        $data->update($request->all());
        return response()->json(['message' => 'Jabatan diperbarui', 'data' => $data]);
    }

    // DELETE /jabatan/{id}
    public function destroy($id)
    {
        $data = Jabatan::find($id);
        if (!$data) {
            return response()->json(['message' => 'Jabatan tidak ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Jabatan dihapus']);
    }
}
