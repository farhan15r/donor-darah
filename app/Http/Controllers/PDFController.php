<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::where('is_admin', false)->get();

        $data = [
            'users' => $users
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('data_user.pdf');
    }
}
