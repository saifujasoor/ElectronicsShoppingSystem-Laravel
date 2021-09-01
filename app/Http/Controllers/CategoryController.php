<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->url = $data['url'];
            $category->status = $status;
            $category->save();
            return redirect('/admin/view-category')->with('flash_message_success','Category has been added Successfully.!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function viewCategories(){
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function editCategory(Request $req, $id = null){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'url'=>$data['url'],'status'=>$status]);
            return redirect('/admin/view-category')->with('flash_message_success','Category has been Updated Successfully.!!');
        }   
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels')); 
    }

    public function deleteCategory(Request $req, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category has been Deleted Successfully.!!');
        }
    }
}
