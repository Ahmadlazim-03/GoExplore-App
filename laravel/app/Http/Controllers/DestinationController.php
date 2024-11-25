<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Carbon\Carbon;

class DestinationController extends Controller
{
    public function all_destination(){
        return view('admin/destination/all-destination');
    }

    public function create_destination(Request $request){
        $nm = $request->Image;
        $namaFile = $nm->getclientOriginalName();
        $nm->move(public_path().'/img',$namaFile);

        $destination = new Destination();
        $destination->Name_Destination = $request->Name_Destination;
        $destination->Locations = $request->Locations;
        $destination->Description = $request->Description;
        $destination->Price_perticket = $request->Price_perticket;
        $destination->Available_seat = $request->Available_seat;
        $destination->Image = $namaFile;
        $destination->Category = $request->Category;
        $destination->Opening_hours = $request->Opening_hours;  
        $destination->tgl = $request->tgl;  
        $destination->updated_at = Carbon::now();
        
      
        $destination->save();
        return redirect('/alldestination');

    }

    public function edit_destination(Request $request){
        $destination = Destination::findOrFail($request->idDestination);
        if ($destination){
            $nm = $request->Image;
            if ($nm) {
                $namaFile = $nm->getClientOriginalName();
                $nm->move(public_path('/img'), $namaFile);
                $destination->Image = $namaFile; 
            }
            $destination->Name_Destination = $request->Name_Destination;
            $destination->Locations = $request->Locations;
            $destination->Description = $request->Description;
            $destination->Price_perticket = $request->Price_perticket;
            $destination->Available_seat = $request->Available_seat;
            $destination->Image = $namaFile;
            $destination->Category = $request->Category;
            $destination->Opening_hours = $request->Opening_hours;  
            $destination->tgl = $request->tgl;  
            $destination->updated_at = Carbon::now();
            $destination->save();
            return redirect('/alldestination');
           
        } else {
            return "<script>alert('ID Tidak Ditemukan')</script>";
        }
    }   

    public function delete_destination($id){
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect('/alldestination');
    }
}
