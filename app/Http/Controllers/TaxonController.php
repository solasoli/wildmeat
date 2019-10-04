<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AppKingdom;
use AppPhylum;
use AppClass;
use AppOrder;
use AppFamilia;
use AppGenus;
use AppSpecies;
use AppVernacular;

class TaxonController extends Controller
{
    public function kingdom(){
      $kingdom = Kingdom::all();
      return view('search', compact('kingdom')); 
    }

    public function phylum(){
      $kingdom_id = Input::get('kingdom_id');
      $phylum = Phylum::where('kingdom_id', '=', $kingdom_id)->get();
      return response()->json($phylum);
    }

    public function class(){
        $phylum_id = Input::get('phylum_id');
        $classes = Classes::where('phylum_id', '=', $phylum_id)->get();
        return response()->json($classes);
      }

    public function order(){
        $classes_id = Input::get('classes_id');
        $order = Order::where('classes_id', '=', $classes_id)->get();
        return response()->json($order);
    
    }

    public function familia() {
        $order_id = Input::get('order_id');
        $familia = Familia::where('orders_id', '=', $order_id)->get();
        return response()->json($familia);
    }

    public function genus(){
        $genus_id = Input::get('familia_id');
        $genus = Familias::where('familia_id', '=', $familia_id)->get();
        return response()->json($genus);
    }

    public function species(){
        $genus_id = Input::get('genus_id');
        $species = Species::where('genus_id', '=', $genus_id)->get();
        return response()->json($species);
    }
}

