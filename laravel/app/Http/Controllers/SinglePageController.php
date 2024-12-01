<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailDestination;
use App\Models\Destination;

class SinglePageController extends Controller

{
    public function index($id){
        $data1 = DetailDestination::where('destinations_id', $id)->first();

        $data2 = Destination::where('idDestination', $id)->first();

        $data3 =  Destination::where('Category', $data2->Category)->get();
        
        return view('landingpage/single-page',[
            "detail" => $data1,
            "destination" => $data2,
            "related" => $data3
        ]);
    }
}
