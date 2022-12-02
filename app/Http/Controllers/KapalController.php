<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use App\Models\Nelayan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KapalController extends Controller
{
    public function index() {
        $datas = DB::select('select * from kapal');

        return view('nelayan.index')
            ->with('datas', $datas);
    }

    public function create() {
        $nelayan = Nelayan::all();
        return view('kapal.add',compact('nelayan'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_kapal' => 'required',
            'nama_kapal' => 'required',
            'tahun_kapal' => 'required',
            'id_nelayan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kapal(id_kapal, nama_kapal, tahun_kapal,id_nelayan ) VALUES (:id_kapal, :nama_kapal, :tahun_kapal, :id_nelayan)',
        [
            'id_kapal' => $request->id_kapal,
            'nama_kapal' => $request->nama_kapal,
            'tahun_kapal' => $request->tahun_kapal,
            'id_nelayan' => $request->id_nelayan,
            
       
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

        return redirect()->route('nelayan.index')->with('success', 'Data kapal berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('kapal')->where('id_kapal', $id)->first();
        $nelayan = Nelayan::all();
        return view('kapal.edit')->with('data', $data,compact('nelayan'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_kapal' => 'required',
            'nama_kapal' => 'required',
            'tahun_kapal' => 'required',
            'id_nelayan' => 'required',
            

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kapal SET id_kapal = :id_kapal, nama_kapal = :nama_kapal, tahun_kapal = :tahun_kapal, id_nelayan = :id_nelayan WHERE id_kapal = :id',
        [
            'id' => $id,
            'id_kapal' => $request->id_kapal,
            'nama_kapal' => $request->nama_kapal,
            'tahun_kapal' => $request->tahun_kapal,
            'id_nelayan' => $request->id_nelayan,

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

        return redirect()->route('nelayan.index')->with('success', 'Data kapal berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM kapal WHERE id_kapal = :id_kapal', ['id_kapal' => $id]);

        // Menggunakan laravel eloquent
        // Ikan::where('id_ikan', $id)->delete();

        return redirect()->route('nelayan.index')->with('success', 'Data kapal berhasil dihapus');
    }
}
