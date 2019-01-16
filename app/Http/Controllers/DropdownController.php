<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DropdownController extends Controller
{
    public function index()
    {
        $list = DB::table('provinces')
        ->orderBy('name_th')->get();
        return view('province')->with('list', $list);
    }
    public function fetch(Request $request)
    {
        $id = $request->get('select');
        // dd($id);
        $result = array();
        $query = DB::table('provinces')
            ->join('amphures', 'provinces.id', '=','amphures.province_id')
            ->select('amphures.name_th')
            ->where('provinces.id', $id)
            ->groupBy('amphures.name_th')
            ->get();
        $output = '<option value="">เลือกอำเภอของท่าน</option>';
        foreach ($query as $row) {
            $output.='<option value="'.$row->name_th.'">'.$row->name_th.'</option>';
        }
        echo $output;
    }
}
