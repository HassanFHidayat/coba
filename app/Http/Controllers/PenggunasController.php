<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('users.index', ['penggunas' => $penggunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //$file = $request->file('foto');
        $tujuan_upload = 'foto';
        //$file->move($tujuan_upload, $file->getClientOriginalName());
        
        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'job' => $request->jabatan,
            'password' => $request->password,
            'foto' => $request->foto->move($tujuan_upload, $request->foto->getClientOriginalName())
        ]);

        //Pengguna::create($request->all());
        return redirect('/users')->with('status', 'Data User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        return view('users.show', ['pengguna' => $pengguna]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('users.edit', ['pengguna' => $pengguna]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        if ($request->hasFile('foto')) {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
            $tujuan_upload = 'foto';
            
            Pengguna::where('id', $pengguna->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'job' => $request->jabatan,
                'password' => $request->password,
                'foto' => $request->foto->move($tujuan_upload, $request->foto->getClientOriginalName())
            ]);
        } else {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);

            Pengguna::where('id', $pengguna->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'job' => $request->jabatan,
                'password' => $request->password
            ]);
        }

        return redirect('/users')->with('status', 'Data User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        Pengguna::destroy($pengguna->id);
        return redirect('/users')->with('status', 'Data User berhasil dihapus');
    }
}
