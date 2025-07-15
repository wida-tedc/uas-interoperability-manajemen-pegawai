<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    // GET /bidang
    public function index()
    {
        return response()->json(Bidang::all());
    }

    // GET /bidang/{id}
    public function show($id)
    {
        $data = Bidang::find($id);
        if (!$data) {
            return response()->json(['message' => 'Bidang tidak ditemukan'], 404);
        }
        return response()->json($data);
    }

    // POST /bidang
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $data = Bidang::create($request->all());
        return response()->json(['message' => 'Bidang ditambahkan', 'data' => $data]);
    }

    // PUT /bidang/{id}
    public function update(Request $request, $id)
    {
        $data = Bidang::find($id);
        if (!$data) {
            return response()->json(['message' => 'Bidang tidak ditemukan'], 404);
        }

        $data->update($request->all());
        return response()->json(['message' => 'Bidang diperbarui', 'data' => $data]);
    }

    // DELETE /bidang/{id}
    public function destroy($id)
    {
        $data = Bidang::find($id);
        if (!$data) {
            return response()->json(['message' => 'Bidang tidak ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Bidang dihapus']);
    }
}
