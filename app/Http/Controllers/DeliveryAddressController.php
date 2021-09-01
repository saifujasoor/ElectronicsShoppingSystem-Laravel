<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Area;
use App\City;
use App\State;
use App\DeliveryAddress;

class DeliveryAddressController extends Controller
{   
    // Add Delivery Address
    public function addAddress(Request $req){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        if($req->isMethod('post')){
            $data = $req->all();
            $DeliveryAddress = new DeliveryAddress;
            $deliveryAddress = DeliveryAddress::find($user_id);
            $DeliveryAddress->user_id = session::get('id');
            $DeliveryAddress->customer_name = $data['customer_name'];
            $DeliveryAddress->address = $data['address'];
            $DeliveryAddress->landmark = $data['landmark'];
            $DeliveryAddress->email = $data['email'];
            $DeliveryAddress->contact_no = $data['contact_no'];
            $DeliveryAddress->flag = $data['hide'];
            $DeliveryAddress->area_id = $data['area_id'];
            $DeliveryAddress->user_id = Auth::user()->id;
            // print_r($data['hide']);die;
                
            $check = DeliveryAddress::where('user_id',$user_id)->count();
            if($check > 0){
                $addresscheck = DeliveryAddress::where('address',$data['address'])->count();
                $addresscheck = DeliveryAddress::where('landmark',$data['landmark'])->count();
                if($addresscheck>0){
                    return redirect()->back()->with('flash_message_error','Address is already exist');
                }
                else{
                    if($data['hide'] == "1"){
                        // $data1 = \DB::table('delivery_addresses')
                        // ->where(['flag',1],['user_id',$user_id])
                        // ->update(['flag' => 0]);

                        // $flagcheck = DeliveryAddress::where('user_id',$user_id);
                        // print_r($flagcheck->address);die;

                        $flagcheck = DeliveryAddress::where('flag',1)
                                    ->where('user_id',$user_id)
                                    ->update(['flag'=>0]);
                        // $flagcheck->save();
                        // print_r($flagcheck->id);die;
                        // $data1->save();
                    }
                    $DeliveryAddress->save();
                    return redirect()->back()->with('flash_message_success','Address Successfully Added to Account!');
                }
            }
            else{
                if($data['hide'] == "1"){
                    $DeliveryAddress->save();
                    return redirect()->back()->with('flash_message_success','Address Successfully Added to Account!');
                }
                else{
                    $DeliveryAddress = new DeliveryAddress;
                    $deliveryAddress = DeliveryAddress::find($user_id);
                    $DeliveryAddress->user_id = session::get('id');
                    $DeliveryAddress->customer_name = $data['customer_name'];
                    $DeliveryAddress->address = $data['address'];
                    $DeliveryAddress->landmark = $data['landmark'];
                    $DeliveryAddress->email = $data['email'];
                    $DeliveryAddress->contact_no = $data['contact_no'];
                    $DeliveryAddress->flag = 1;
                    $DeliveryAddress->area_id = $data['area_id'];
                    $DeliveryAddress->user_id = Auth::user()->id;
                    $DeliveryAddress->save();
                    return redirect('/account')->with('flash_message_success','Your Address has been added successfully!');
                }
            } 
        }
    }

    // Delete Delivery Address
    public function deleteAddress($id = NULL){
        DeliveryAddress::where(['id'=>$id])->delete();
        return redirect('/account')->with('flash_message_success','Address Details has been deleted successfully..!!');
    }

    // Edit Delivery Address 
    public function editAddress(Request $req, $id=NULL){
        $id = $req->get('id');
        $addressDetails = DeliveryAddress::where(['id'=>$id])->first();
        $areas = Area::get();
        // $citisareas = DB::table('delivery_addresses')
        // ->join('areas', 'delivery_addresses.area_id', '=', 'areas.id')
        // ->join('cities', 'areas.city_id', '=', 'cities.id')
        // ->join('states', 'cities.state_id', '=', 'states.id')
        // ->select('areas.name', 'states.name')
        // ->get();
        $areadata = Area::where('id',$addressDetails->area_id)->first();
        $citiesdata = City::where('id',$areadata->city_id)->first();
        $addstates = State::where('id',$citiesdata->state_id)->first();
        return view('users.edit_data')->with(compact('addressDetails','areas','areadata','citiesdata','addstates'));
    }

    public function updateAddress(Request $req, $id=""){
        $user_id = Auth::user()->id;
        // print_r($user_id);
        if($req->isMethod('post')){
            $data = $req->all();
            // print_r($data['flags']);die;
            // print_r($data);
            if($data['flags'] == "1"){
                DeliveryAddress::where('flag',1)
                ->where('user_id',$user_id)
                ->update(['flag'=>0]);
                // print_r($data1);
                DeliveryAddress::where('id',$id)
                ->where('user_id',$user_id)
                ->update(['customer_name'=>$data['customer_name'],
                    'address'=>$data['address'],
                    'landmark'=>$data['landmark'],
                    'email'=>$data['email'],
                    'contact_no'=>$data['contact_no'],
                    'flag'=>1,
                    'area_id'=>$data['area_id']]);
            }
            else{
                DeliveryAddress::where('id',$id)
                    ->where('user_id',$user_id)
                    ->where('flag',1)
                    ->update(['customer_name'=>$data['customer_name'],
                    'address'=>$data['address'],
                    'landmark'=>$data['landmark'],
                    'email'=>$data['email'],
                    'contact_no'=>$data['contact_no'],
                    'flag'=>1,
                    'area_id'=>$data['area_id']]);

                return redirect('/account')->with('flash_message_error','Can not change default address if change the default address than select another address as a default.!!');
            }
                return redirect('/account')->with('flash_message_success','Address Successfully Change');
        }
    }
    
    // Get City name through Ajax
    public function getCity(Request $req){
        // $data = $req->all();
        $addCity = $req->get('idCity');
        $areadata = Area::where('id',$addCity)->first();
        $addcities = City::where(['id'=>$areadata->city_id])->first();
        return [$addcities->name];
    }

    // Get State name through Ajax
    public function getState(Request $req){
        // $data = $req->all();
        $addState = $req->get('idState');
        $areadata = Area::where('id',$addState)->first();
        $citiesdata = City::where(['id'=>$areadata->city_id])->first();
        $addstates = State::where(['id'=>$citiesdata->state_id])->first();
        return [$addstates->name];
    }
}
