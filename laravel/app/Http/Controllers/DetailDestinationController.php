<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailDestination;

class DetailDestinationController extends Controller
{
    public function detail_destination(){
        return view('admin/destination/detail-destination');
    }

    public function create_detail_destination(Request $request){
        $images = [];
        $videoPath = null; 

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/img'), $filename);
                $images[] = '/img/' . $filename; 
            }
        }

        $nm = $request->video;
        $namaFile = $nm->getclientOriginalName();
        $nm->move(public_path().'/video',$namaFile);

        $detail_destination = new DetailDestination();
        $detail_destination->destinations_id = $request->id_destination;
        $detail_destination->image = json_encode($images); 
        $detail_destination->description = $request->description;
        $detail_destination->video = $namaFile;
        $detail_destination->rating = $request->rating;
        $detail_destination->save();

        return redirect()->back();
    }

    public function edit_detail_destination(Request $request){
        $detail_destination = DetailDestination::findOrFail($request->id_detail_destination);

        $images = [];
        $videoPath = null; 

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/img'), $filename);
                $images[] = '/img/' . $filename; 
            }
        }

        $nm = $request->video;
        $namaFile = $nm->getclientOriginalName();
        $nm->move(public_path().'/video',$namaFile);

        $detail_destination->destinations_id = $request->id_destination;
        $detail_destination->image = json_encode($images); 
        $detail_destination->description = $request->description;
        $detail_destination->video = $namaFile;
        $detail_destination->rating = $request->rating;
        $detail_destination->save();

        return redirect()->back();
    }   

    public function delete_detail_destination($id){
        $destination = DetailDestination::findOrFail($id);
        $destination->delete();
        return redirect()->back();
    }
}
