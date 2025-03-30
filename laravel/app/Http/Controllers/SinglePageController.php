<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Destination;
use App\Models\DetailDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinglePageController extends Controller
{
    public function index($id)
    {
        $data1 = DetailDestination::where('destinations_id', $id)->first();

        $data2 = Destination::where('idDestination', $id)->first();

        $data3 = Destination::where('Category', $data2->Category)->get();

        return view('landingpage/single-page', [
            'detail' => $data1,
            'destination' => $data2,
            'related' => $data3,
            'DB_comment' => Comment::where('id_destination', request()->route('id'))
                ->latest()
                ->paginate(3),
        ]);
    }

    public function tambah_comment($id, Request $request)
    {
        $add = Comment::create([
            'id_destination' => $id,
            'id_user' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        if ($add) {
            return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
        }
    }
}
