<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Nelayan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IkanController extends Controller
{
    public function index() {
        $datas = DB::select('select * from ikan');

        return view('nelayan.index')
            ->with('datas', $datas);
    }

    public function create() {
        $nelayan = Nelayan::all();
        return view('ikan.add',compact('nelayan'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_ikan' => 'required',
            'nama_ikan' => 'required',
            'berat_ikan' => 'required',
            'id_nelayan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO ikan(id_ikan, nama_ikan, berat_ikan,id_nelayan ) VALUES (:id_ikan, :nama_ikan, :berat_ikan, :id_nelayan)',
        [
            'id_ikan' => $request->id_ikan,
            'nama_ikan' => $request->nama_ikan,
            'berat_ikan' => $request->berat_ikan,
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

        return redirect()->route('nelayan.index')->with('success', 'Data ikan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('ikan')->where('id_ikan', $id)->first();
        $nelayan = Nelayan::all();
        return view('ikan.edit')->with('data', $data,compact('nelayan'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_ikan' => 'required',
            'nama_ikan' => 'required',
            'berat_ikan' => 'required',
            'id_nelayan' => 'required',
            

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE ikan SET id_ikan = :id_ikan, nama_ikan = :nama_ikan, berat_ikan = :berat_ikan, id_nelayan = :id_nelayan WHERE id_ikan = :id',
        [
            'id' => $id,
            'id_ikan' => $request->id_ikan,
            'nama_ikan' => $request->nama_ikan,
            'berat_ikan' => $request->berat_ikan,
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

        return redirect()->route('nelayan.index')->with('success', 'Data ikan berhasil diubah');
    }

    public function delete($id_ikan) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM ikan WHERE id_ikan = :id_ikan', ['id_ikan' => $id_ikan]);

        // Menggunakan laravel eloquent
        // Ikan::where('id_ikan', $id)->delete();

        return redirect()->route('nelayan.index')->with('success', 'Data ikan berhasil dihapus');
    }
}
