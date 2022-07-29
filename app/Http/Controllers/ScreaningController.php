<?php

namespace App\Http\Controllers;

use App\Models\Screaning;
use App\Models\Hasil;
use App\Models\User;
use Illuminate\Http\Request;

class ScreaningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sehat' => '',
            'minum_obat' => '',
            'demam' => '',
            'cabut_gigi' => '',
            'hiv' => '',
            'kontak_hepatitis' => '',
            'sex_period' => '',
            'riwayat_donor' => '',
            'sarapan' => '',
            'hamil' => ''
        ]);

        if (auth()->user()->jenis_kelamin === 'Laki-Laki') {
            $validated['hamil'] = '0';
        }

        $data = Screaning::create($validated);



        $idScreaning = $data->id;

        User::where('id', auth()->user()->id)->update(['id_form' => $idScreaning]);

        if ($validated['sehat'] != '1'
        || $validated['minum_obat'] == '1'
        || $validated['demam'] == '1'
        || $validated['cabut_gigi'] == '1'
        || $validated['hiv'] == '1'
        || $validated['kontak_hepatitis'] == '1'
        || $validated['sex_period'] == '1'
        || $validated['riwayat_donor'] == '1'
        || $validated['sarapan'] != '1'
        || $validated['hamil']) {
            Hasil::create([
                'hasil_form' => 'Tidak dapat mendonorkan darah',
                'id_form' => $idScreaning
            ]);
        } else {
            Hasil::create([
                'hasil_form' => 'Bisa mendonorkan darah',
                'id_form' => $idScreaning
            ]);
        }


        //sesion flash
        session()->flash('berhasil', 'berhasil input form');

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Screaning  $screaning
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'screaning' => Screaning::firstWhere('id', $id),
            'hasil' =>  Hasil::firstWhere('id_form', $id)
        ];

        return view('user.userHasilForm', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Screaning  $screaning
     * @return \Illuminate\Http\Response
     */
    public function edit(Screaning $screaning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Screaning  $screaning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screaning $screaning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Screaning  $screaning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screaning $screaning)
    {
        //
    }
}
