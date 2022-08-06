<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function toRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        return view('user.userRegister', $data);
    }

    public function Register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        //backcript password
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        //sesion flash
        session()->flash('berhasil', 'berhasil daftar');

        return redirect('/login/user');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth::attempt((['username' => $credentials['username'], 'password' => $credentials['password']]))) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with('loginError', 'Login failed.');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function form()
    {
        return view('user.userForm');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            $data = [
                'users' => User::where('is_admin', false)->get(),
            ];
            return view('admin.adminDashboard', $data);
        }
        $data = [
            'user' => auth()->user()
        ];
        return view('user.userDashboard');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = [
            'user' => auth()->user()
        ];
        if (auth()->user()->is_admin) {
            return view('admin.adminProfile', $data);
        }
        return view('user.userProfile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        if (auth()->user()->is_admin) {
            $data = [
                'user' => User::where('nik', $nik)->get(),
            ];
            return view('user.userUpdateAdmin', $data);
        }
        return view('user.userUpdate', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'jenis_kelamin' => '',
        ]);

        if ($user->id_form) {
            $validated['jenis_kelamin'] = $user->jenis_kelamin;
        };

        User::where('id', $user->id)->update($validated);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $user = User::firstWhere('nik', $nik);
        $user->delete();

        return redirect('/dashboard')->with('success', 'Post has been deleted');
    }

    public function updateAdmin(Request $request, $nik)
    {
        $user = User::firstWhere('nik', $nik);
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'jenis_kelamin' => '',
        ]);

        if ($user->id_form) {
            $validated['jenis_kelamin'] = $user->jenis_kelamin;
        };

        User::where('id', $user->id)->update($validated);

        return redirect('/dashboard');
    }
}
