<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\TblPatient;
use App\Models\TblDivision;
use App\Models\TblDistrict;
use App\Models\TblThana;
use DB;

class PatientController extends Controller
{
    public function index(){
        $divisions = TblDivision::all();
        return view('index', compact('divisions'));
    }
    public function districts($id){

        $districts = DB::table('tbl_districts')
                    ->select('tbl_districts.*')
                    ->join('tbl_divisions', 'tbl_districts.parent_id', 'tbl_divisions.id')
                    ->where('tbl_divisions.id', $id)
                    ->get();
        return response()->json( [ 'districts'=>$districts ]);

        // Elequent Model return an OBJECT
        // $all_districts = TblDivision::with('districts')->find($id);
        // return response()->json( [ 'all_districts'=>$all_districts ]);

    }

    public function thanas($id){

        // Elequent Model return an OBJECT
        $all_thanas = TblDistrict::with('thanas')->find($id);
        return response()->json( [ 'all_thanas'=>$all_thanas ]);


    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'dob' => 'required',
            'dob' => 'required|date|date_format:Y-m-d',
            'disease' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $division_id = $request->division;
        $district_id = $request->district;
        $thana_id = $request->thana;

        $division = TblDivision::find($division_id);
        $district = TblDistrict::find($district_id);
        $thana = TblThana::find($thana_id);
        $location = $division->name . ','. $district->name . ','. $thana->name ; 
        
        $data = new TblPatient;
        $data['name'] =trim($request->name);
        $data['dob'] = $request->dob;
        $data['disease'] = $request->disease;
        $data['cell'] = $request->phone;
        $data['location'] = $location;
        
        $data->save();
        return redirect()->back();
        
    }

}
