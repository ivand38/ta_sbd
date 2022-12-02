<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Nelayan;
use App\Models\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NelayanController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $datas = DB::table('nelayan')
                ->where('nama', 'like', "%$katakunci%")
                ->orWhere('asal', 'like', "%$katakunci%")
                ->paginate(3);
        } else {
            $datas = DB::select('select * from nelayan');
        }
        if (strlen($katakunci)) {
            $ikans = Ikan::where('nama_ikan', 'like', "%$katakunci%")
                ->orWhere('berat_ikan', 'like', "%$katakunci%")
                ->paginate(3);
        } else {
            $ikans = Ikan::all();
        }
        if (strlen($katakunci)) {
            $kapals = Kapal::where('nama_kapal', 'like', "%$katakunci%")
                ->orWhere('tahun_kapal', 'like', "%$katakunci%")
                ->paginate(3);
        } else {
            $kapals = Kapal::all();
        }
        $joins = DB::table('ikan')
            ->join('nelayan', 'nelayan.id_nelayan', '=', 'ikan.id_nelayan')
            ->select('ikan.*', 'nelayan.nama','nelayan.asal')
            ->get();
        $joins2 = DB::table('kapal')
            ->join('nelayan', 'nelayan.id_nelayan', '=', 'kapal.id_nelayan')
            ->select('kapal.*', 'nelayan.nama','nelayan.asal')
            ->get();
        return view('nelayan.index')
            ->with('datas', $datas)
            ->with('ikans', $ikans)
            ->with('kapals', $kapals)
            ->with('joins',$joins)
            ->with('joins2',$joins2);
    
    }

    public function create()
    {
        return view('nelayan.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_nelayan' => 'required',
            'nama' => 'required',
            'asal' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO nelayan(id_nelayan, nama, asal ) VALUES (:id_nelayan, :nama, :asal)',
            [
                'id_nelayan' => $request->id_nelayan,
                'nama' => $request->nama,
                'asal' => $request->asal,


            ]
        );

        // Menggunakan laravel eloquent
        // departement::create([
        //     'id_departement' => $request->id_departement,
        //     'nama_departement' => $request->nama_departement,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('nelayan.index')->with('success', 'Data nelayan berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('nelayan')->where('id_nelayan', $id)->first();

        return view('nelayan.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_nelayan' => 'required',
            'nama' => 'required',
            'asal' => 'required',


        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE nelayan SET id_nelayan = :id_nelayan, nama = :nama, asal = :asal WHERE id_nelayan = :id',
            [
                'id' => $id,
                'id_nelayan' => $request->id_nelayan,
                'nama' => $request->nama,
                'asal' => $request->asal,

            ]
        );

        // Menggunakan laravel eloquent
        // departement::where('id_departement', $id)->update([
        //     'id_departement' => $request->id_departement,
        //     'nama_departement' => $request->nama_departement,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('nelayan.index')->with('success', 'Data nelayan berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM nelayan WHERE id_nelayan = :id_nelayan', ['id_nelayan' => $id]);

        // Menggunakan laravel eloquent
        // Nelayan::where('id_nelayan', $id)->delete();

        return redirect()->route('nelayan.index')->with('success', 'Data nelayan berhasil dihapus');
    }
}
