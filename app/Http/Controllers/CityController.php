<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;

class CityController extends Controller
{
    public function addCity(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $city = new City;
            $city->name = $data['name'];
            $city->state_id = $data['state_id'];
            $city->save();
            return redirect('/admin/view-city')->with('flash_message_success','City has been added Successfully.!!');
        }
        $states = State::all();
        return view('admin.city.add_city')->with(compact('states'));
    }

    public function viewCity(){
        $cities = City::get();
        foreach ($cities as $key => $val) {
            $state_name = State::where(['id'=>$val->state_id])->first();
            $cities[$key]->state_name = $state_name->name;
        }
        return view('admin.city.view_city')->with(compact('cities'));
    }

    public function editCity(Request $req, $id=''){
        if($req->isMethod('post')){
            $data = $req->all();
            
            City::where(['id'=>$id])->update(['name'=>$data['name'],'state_id'=>$data['state_id']]);
            return redirect('/admin/view-city')->with('flash_message_success','City Details has been updated successfully..!!');
        }
        $cityDetails = City::where(['id'=>$id])->first();
        $statelevels = State::get();
        return view('admin.city.edit_city')->with(compact('cityDetails','statelevels')); 
    }

    public function deleteCity($id = NULL){
        City::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','City Details has been deleted successfully..!!');
    }
}
