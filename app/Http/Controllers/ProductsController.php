<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Exports\productsExport;
use App\Imports\productsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function addProduct(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error','Category Name is missing..!!');
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            // Upload Image
            if($req->hasFile('image')) {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large/'.$filename;
                    $medium_image_path = 'images/backend_images/product/medium/'.$filename;
                    $small_image_path = 'images/backend_images/product/small/'.$filename;

                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                
                    // Store image name in products table
                    $product->image = $filename;
                }
            } 
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }
            $product->model_name = $data['model_name'];
            $product->model_number = $data['model_number'];
            $product->browse_type = $data['browse_type'];
            $product->sim_type = $data['sim_type'];
            $product->hybrid_sim_slot = $data['hybrid_sim_slot'];
            $product->touch_screen = $data['touch_screen'];
            $product->otg_compatible = $data['otg_compatible'];
            $product->display_size = $data['display_size'];
            $product->resolution = $data['resolution'];
            $product->resolution_type = $data['resolution_type'];
            $product->other_display_features = $data['other_display_features'];
            $product->operating_system = $data['operating_system'];
            $product->processor_type = $data['processor_type'];
            $product->primary_clock_speed = $data['primary_clock_speed'];
            $product->secondary_clock_speed = $data['secondary_clock_speed'];
            $product->operating_frequency = $data['operating_frequency'];
            $product->processor_core = $data['processor_core'];
            $product->supported_memory_card_type = $data['supported_memory_card_type'];
            $product->memory_card_slot_type = $data['memory_card_slot_type'];
            $product->primary_camera_available = $data['primary_camera_available'];
            $product->primary_camera = $data['primary_camera'];
            $product->primary_camera_features = $data['primary_camera_features'];
            $product->secondary_camera_available = $data['secondary_camera_available'];
            $product->secondary_camera = $data['secondary_camera'];
            $product->secondary_camera_features = $data['secondary_camera_features'];
            $product->flash = $data['flash'];
            $product->dual_camera_lens = $data['dual_camera_lens'];
            $product->network_type = $data['network_type'];
            $product->supported_networks = $data['supported_networks'];
            $product->internet_connectivity = $data['internet_connectivity'];
            $product->gprs = $data['gprs'];
            $product->pre_installed_browser = $data['pre_installed_browser'];
            $product->micro_usb_port = $data['micro_usb_port'];
            $product->blutooth_support = $data['blutooth_support'];
            $product->blutooth_version = $data['blutooth_version'];
            $product->wifi = $data['wifi'];
            $product->wifi_version = $data['wifi_version'];
            $product->usb_connectivity = $data['usb_connectivity'];
            $product->audio_jack = $data['audio_jack'];
            $product->touchscreen_type = $data['touchscreen_type'];
            $product->sim_size = $data['sim_size'];
            $product->sensors = $data['sensors'];
            $product->other_features = $data['other_features'];
            $product->gps_type = $data['gps_type'];
            $product->fm_radio = $data['fm_radio'];
            $product->audio_format = $data['audio_format'];
            $product->video_format = $data['video_format'];
            $product->battery_capacity = $data['battery_capacity'];
            $product->width = $data['width'];
            $product->height = $data['height'];
            $product->depth = $data['depth'];
            $product->weight = $data['weight'];
            $product->warranty = $data['warranty'];
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            $product->status = $status;
            $product->save();
            // return redirect()->back()->with('flash_message_success','Product added Successfully..!!');   
            return redirect('/admin/view-products')->with('flash_message_success','Product has been added Successfully..!!');
        }

        // Categories drop down start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>---Select Category---</option>";
        foreach ($categories as $cat) {
           $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
           $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
           foreach ($sub_categories as $sub_cat) {
               $categories_dropdown.="<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
           }
       }
       // Categories drop down end
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $req , $id = NULL){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data);die;

            if($req->hasFile('image')) {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large/'.$filename;
                    $medium_image_path = 'images/backend_images/product/medium/'.$filename;
                    $small_image_path = 'images/backend_images/product/small/'.$filename;

                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }else{
                $filename = $data['current_image']; 
            }

            if(empty($data['description'])){
                $data['description'] = '';
            }

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],
            'image'=>$filename,
            'description'=>$data['description'],
            'model_name'=>$data['model_name'],
            'model_number'=>$data['model_number'],
            'browse_type'=>$data['browse_type'],
            'sim_type'=>$data['sim_type'],
            'hybrid_sim_slot'=>$data['hybrid_sim_slot'],
            'touch_screen'=>$data['touch_screen'],
            'otg_compatible'=>$data['otg_compatible'],
            'display_size'=>$data['display_size'],
            'resolution'=>$data['resolution'],
            'resolution_type'=>$data['resolution_type'],
            'other_display_features'=>$data['other_display_features'],
            'operating_system'=>$data['operating_system'],
            'processor_type'=>$data['processor_type'],
            'processor_core'=>$data['processor_core'],
            'primary_clock_speed'=>$data['primary_clock_speed'],
            'secondary_clock_speed'=>$data['secondary_clock_speed'],
            'operating_frequency'=>$data['operating_frequency'],
            'supported_memory_card_type'=>$data['supported_memory_card_type'],'memory_card_slot_type'=>$data['memory_card_slot_type'],
            'primary_camera_available'=>$data['primary_camera_available'],
            'primary_camera'=>$data['primary_camera'],
            'primary_camera_features'=>$data['primary_camera_features'],'secondary_camera_available'=>$data['secondary_camera_available'],
            'secondary_camera'=>$data['secondary_camera'],
            'secondary_camera_features'=>$data['secondary_camera_features'],
            'flash'=>$data['flash'],
            'dual_camera_lens'=>$data['dual_camera_lens'],
            'network_type'=>$data['network_type'],
            'supported_networks'=>$data['supported_networks'],
            'internet_connectivity'=>$data['internet_connectivity'],
            'gprs'=>$data['gprs'],
            'pre_installed_browser'=>$data['pre_installed_browser'],
            'micro_usb_port'=>$data['micro_usb_port'],
            'blutooth_support'=>$data['blutooth_support'],
            'blutooth_version'=>$data['blutooth_version'],
            'wifi'=>$data['wifi'],
            'wifi_version'=>$data['wifi_version'],
            'usb_connectivity'=>$data['usb_connectivity'],
            'audio_jack'=>$data['audio_jack'],
            'touchscreen_type'=>$data['touchscreen_type'],
            'sim_size'=>$data['sim_size'],
            'sensors'=>$data['sensors'],
            'other_features'=>$data['other_features'],
            'gps_type'=>$data['gps_type'],
            'fm_radio'=>$data['fm_radio'],
            'audio_format'=>$data['audio_format'],
            'video_format'=>$data['video_format'],
            'battery_capacity'=>$data['battery_capacity'],
            'width'=>$data['width'],
            'height'=>$data['height'],
            'depth'=>$data['depth'],
            'weight'=>$data['weight'],
            'warranty'=>$data['warranty'],
            'status' => $status]);
            return redirect('/admin/view-products')->with('flash_message_success','Product has been updated successfully..!!');
        }
        // Get Product Details
        $productDetails = Product::where(['id'=>$id])->first();

        // Categories drop down start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>---Select Category---</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $productDetails->category_id) {
                $selected = "selected"; 
            }
            else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                if ($sub_cat->id == $productDetails->category_id) {
                    $selected = "selected"; 
                }
                else{ 
                    $selected = "";
                }
               $categories_dropdown.="<option value = '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
           }
       }
        // Categories drop down end
        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }

    public function viewProducts(){
        // $products = Product::get();
        // // $products = json_decode(json_encode($products));
        // foreach ($products as $key => $val) {
        //     $category_name = Category::where(['id'=>$val->category_id])->first();
        //     $products[$key]->category_name = $category_name->name;
        // }
        $products = \DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            
            ->get();
        // echo "<pre>"; print_r($products); die;
        return view('admin.products.view_products')->with(compact('products'));
    }

    public function deleteProduct($id = NULL){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been deleted successfully..!!');
    }

    public function deleteProductImage($id = NULL){
        // Get Product Image Name
        $productImage = Product::where(['id'=>$id])->first();

        // Get Product Image Paths
        $large_image_path = 'images/backend_images/product/large/';
        $medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

        // Delete large Image if not exist in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image); 
        }
        // Delete Image From Products Table
        Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Product Image has been deleted successfully..!!');
    }

    public function deleteAltImage($id = NULL){
        // Get Product Image Name
        $productImage = ProductsImage::where(['id'=>$id])->first();

        // Get Product Image Paths
        $large_image_path = 'images/backend_images/product/large/';
        $medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

        // Delete large Image if not exist in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image); 
        }
        // Delete Image From Products Table
        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product Alternate Image has been deleted successfully..!!');
    }

    public function addAttributes(Request $req, $id = NULL){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first(); 
        // $productDetails = json_decode(json_encode($productDetails));
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data);die;
            foreach ($data['ram'] as $key => $val) {
                if(!empty($val)){
                    $attribute = new ProductsAttribute;
                    $attribute->product_id= $id;
                    $attribute->ram = $val;
                    $attribute->storage = $data['storage'][$key];
                    $attribute->color = $data['color'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success','Product Attributes has been added successfully..!!');
        }

        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }

    public function editAttributes(Request $req, $id = NULL){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            foreach ($data['idAttr'] as $key => $attr) {
                ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['ram'=>$data['ram'][$key],'storage'=>$data['storage'][$key],'color'=>$data['color'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Product Attributes has been updated sucessfully');
        }
    }

    public function addImages(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;  
                    $image->product_id = $data['product_id'];
                    $image->save();
                }   
            }

            return redirect('admin/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

        }
        $productImages = ProductsImage::where(['product_id'=>$id])->get();
        return view('admin.products.add_images')->with(compact('productDetails','productImages'));
    }

    public function deleteAttribute($id = NULL){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Attribute has been deleted successfully..!!');
    }

    public function products($url = NULL){

        // Show 404 page if category URL does not exist
        $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
        if($countCategory==0){
            abort(404);
        }

        // Get All Categories and Subcategories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['url'=>$url])->first();
        if($categoryDetails->parent_id==0){
            // If url is main category url
            $subcategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
            foreach ($subcategories as $subcat) {
                    $cat_ids[] = $subcat->id;
                }
            // $productsAll = \DB::table('products')
            // ->leftJoin('products_attributes','products_attributes.product_id','=','products.id')->select('products.*','products_attributes.price as productprice')
            // ->get();   

            $productsAll = Product::whereIn('category_id',$cat_ids)->where('status',1)->paginate(4);
        }else{
            $productsAll = Product::where(['category_id'=>$categoryDetails->id])->paginate(4);
            
            // $productsAll = \DB::table('products')
            // ->leftJoin('products_attributes','products_attributes.product_id','=','products.id')->select('products.*','products_attributes.price as productprice')
            // ->get();                                
        } 
        return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
    }

    public function searchProducts(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            $categories = Category::with('categories')->where(['parent_id'=>0])->get();

            $search_product = $data['product'];

            $productsAll = Product::where('product_name','like','%'.$search_product.'%')->where('status',1)->paginate();

            return view('products.listing')->with(compact('categories','productsAll','search_product'));
        }
    }

    public function product($id = ""){
        // Show 404 page if product is disabled
        $productDetails = Product::where(['id'=>$id,'status'=>1])->count();
        if($productDetails == 0){
            abort(404);
        }
        // Get Product Details 
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->get();
        // echo "<pre>"; print_r($relatedProducts);die;
    
        // Get Product Alternate Images
        $productAltImages = ProductsImage::where('product_id',$id)->get();

        $total_stock = ProductsAttribute::where('id',$id)->count('stock'); 

        return view('products.product-detail')->with(['productDetails' => $productDetails,'categories' => $categories, 'productAltImages' => $productAltImages, 'total_stock'=>  $total_stock, 'relatedProducts' => $relatedProducts]);

        // return view('products.product-detail')->with(compact('productDetails','categories'));
    }

    public function getProductColor(Request $req){
        $data = $req->all();
        // echo "<pre>"; print_r($data); die;
        $proArr = $data['idColor'];
        $proAttr = ProductsAttribute::where('id',$proArr)->first();
        
        return ['price' => $proAttr->price];
        // echo "#";
        // return ['stock' => $proAttr->stock];
    }
    
    public function getProductStock(Request $req){
        $data = $req->all();
        $proArr = $data['idColor'];
        $proAttr = ProductsAttribute::where('id',$proArr)->first();
        return [$proAttr->stock]; 
    }

    public function getProductRamRom(Request $req){
        $data = $req->all();
        $proArr = $data['idColor'];
        $proAttr = ProductsAttribute::where('id',$proArr)->first();
        return ['(',$proAttr->color,',',$proAttr->ram,',',$proAttr->storage,')'];
    }

    public function exportProducts(){
        return Excel::download(new productsExport,'products.xlsx');
    }

    public function importProducts(Request $req){
        $this->validate($req,[
            'select_file'   =>  'required|mimes:xls,xlsx'
        ]);
        Excel::import(new productsImport,request()->file('select_file'));
        return back()->with('flash_message_success','Excel Data Imported Successfully');
    }
}
