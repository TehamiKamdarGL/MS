<?php

namespace App\Http\Controllers;

use App\Models\raw_material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getRM(){
        $columns = DB::getSchemaBuilder()->getColumnListing('raw_materials');
        $rm = raw_material::all();
        return view('admin.raw_material', compact('columns', 'rm'));
    }
    public function addRM(){
        
    }
}
