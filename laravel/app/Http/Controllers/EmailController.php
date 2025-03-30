<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $create = Email::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ]);
    }

    public function show($id)
    {
        return view('admin/email', [
            'email' => Email::where('id', $id)->first(),
        ]);
    }
}
