<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
class StateController extends Controller
{
    public function addState(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $state = new State;
            $state->name = $data['name'];
            $state->save();
            return redirect('/admin/view-state')->with('flash_message_success','State has been added Successfully.!!');
        }
        return view('admin.state.add_state');
    }

    public function viewState(){
        $states = State::get();
        return view('admin.state.view_state')->with(compact('states'));
    }

    public function editState(Request $req, $id=''){
        if($req->isMethod('post')){
            $data = $req->all();
            
            State::where(['id'=>$id])->update(['name'=>$data['name']]);
            return redirect('/admin/view-state')->with('flash_message_success','State Details has been updated successfully..!!');
        }
        $stateDetails = State::where(['id'=>$id])->first();
        return view('admin.state.edit_state')->with(compact('stateDetails')); 
    }

    public function deleteState($id = NULL){
        State::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','State Details has been deleted successfully..!!');
    }
}
