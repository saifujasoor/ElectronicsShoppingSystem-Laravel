<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\City;

class AreaController extends Controller
{
    public function addArea(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $area = new Area;
            $area->name = $data['name'];
            $area->pincode = $data['pincode'];
            $area->city_id = $data['city_id'];
            $area->save();
            return redirect('/admin/view-area')->with('flash_message_success','Area has been added Successfully.!!');
        }
        $cities = City::get();
        return view('admin.area.add_area')->with(compact('cities'));
    }

    public function viewArea(){
        $areas = Area::get();
        foreach ($areas as $key => $val) {
            $city_name = city::where(['id'=>$val->city_id])->first();
            $areas[$key]->city_name = $city_name->name;
        }
        return view('admin.area.view_area')->with(compact('areas'));
    }

    public function editArea(Request $req, $id=''){
        if($req->isMethod('post')){
            $data = $req->all();
            
            Area::where(['id'=>$id])->update(['name'=>$data['name'],'pincode'=>$data['pincode'],'city_id'=>$data['city_id']]);
            return redirect('/admin/view-area')->with('flash_message_success','Area Details has been updated successfully..!!');
        }
        $areaDetails = Area::where(['id'=>$id])->first();
        $citylevels = City::get();
        return view('admin.area.edit_area')->with(compact('areaDetails','citylevels')); 
    }

    public function deleteArea($id = NULL){
        Area::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Area Details has been deleted successfully..!!');
    }
}
