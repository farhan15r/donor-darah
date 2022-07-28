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
            'umur' => 'required',
            'berat_badan' => 'required',
            'hiv' => 'required',
            'pasangan_hiv' => 'required',
            'kontak_hepatitis' => 'required',
            'suntik' => 'required',
            'riwayat_donor' => 'required',
            'sex_period' => 'required'
        ]);

        $data = Screaning::create($validated);

        $idScreaning = $data->id;

        User::where('id', auth()->user()->id)->update(['id_form' => $idScreaning]);

        if ($validated['umur'] < 17
        || $validated['umur'] > 50
        || $validated['berat_badan'] < 47
        || $validated['hiv'] == "Pernah"
        || $validated['pasangan_hiv'] == "Pernah"
        || $validated['kontak_hepatitis'] == "Pernah"
        || $validated['suntik'] == "Pernah"
        || $validated['hiv'] == "Pernah"
        || $validated['sex_period'] == "Pernah"
        || $validated['sex_period'] == "Iya"
        || $validated['riwayat_donor'] == "<=3 Bulan") {
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

        return redirect('/user/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Screaning  $screaning
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = [
            'screaning' => Screaning::firstWhere('id', auth()->user()->id_form),
            'hasil' =>  Hasil::firstWhere('id_form', auth()->user()->id_form)
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
