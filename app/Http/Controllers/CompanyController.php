<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    public function addCompany(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $company = new Company;
            $company->name = $data['name'];
            $company->address = $data['address'];
            $company->mobile = $data['mobile'];
            $company->email = $data['email']; 
            $company->save();
            return redirect('/admin/view-company')->with('flash_message_success','Company has been added Successfully.!!');
        }
        return view('admin.company.add_company');
    }

    public function viewCompany(){
        $companies = Company::get();
        return view('admin.company.view_company')->with(compact('companies'));
    }

    public function editCompany(Request $req, $id=''){
        if($req->isMethod('post')){
            $data = $req->all();
            
            Company::where(['id'=>$id])->update(['name'=>$data['name'],'address'=>$data['address'],'mobile'=>$data['mobile'],'email'=>$data['email']]);
            return redirect('/admin/view-company')->with('flash_message_success','Company Details has been updated successfully..!!');
        }
        $companyDetails = Company::where(['id'=>$id])->first();
        return view('admin.company.edit_company')->with(compact('companyDetails')); 
    }
    public function deleteCompany($id = NULL){
        Company::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Company Details has been deleted successfully..!!');
    }
}   
