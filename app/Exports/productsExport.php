<?php

namespace App\Exports;

use App\Product;
use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class productsExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $productsData = Product::select('category_id','product_name','description','model_name','model_number','browse_type','sim_type','hybrid_sim_slot','touch_screen','otg_compatible','display_size','resolution','resolution_type','other_display_features','operating_system','processor_type','processor_core','primary_clock_speed','secondary_clock_speed','operating_frequency','supported_memory_card_type','memory_card_slot_type','primary_camera_available','primary_camera','primary_camera_features','secondary_camera_available','secondary_camera','secondary_camera_features','flash','dual_camera_lens','network_type','supported_networks','internet_connectivity','gprs','pre_installed_browser','micro_usb_port','blutooth_support','blutooth_version','wifi','wifi_version','usb_connectivity','audio_jack','touchscreen_type','sim_size','sensors','other_features','gps_type','fm_radio','audio_format','video_format','battery_capacity','width','height','depth','weight','warranty')->where('status',1)->orderBy('id','Desc')->get();

        $productsData = \DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->select('category_id','product_name','description','model_name','model_number','browse_type','sim_type','hybrid_sim_slot','touch_screen','otg_compatible','display_size','resolution','resolution_type','other_display_features','operating_system','processor_type','processor_core','primary_clock_speed','secondary_clock_speed','operating_frequency','supported_memory_card_type','memory_card_slot_type','primary_camera_available','primary_camera','primary_camera_features','secondary_camera_available','secondary_camera','secondary_camera_features','flash','dual_camera_lens','network_type','supported_networks','internet_connectivity','gprs','pre_installed_browser','micro_usb_port','blutooth_support','blutooth_version','wifi','wifi_version','usb_connectivity','audio_jack','touchscreen_type','sim_size','sensors','other_features','gps_type','fm_radio','audio_format','video_format','battery_capacity','width','height','depth','weight','warranty')
            ->get();
        // foreach ($productsData as $key => $product) {
        //     $catName = Category::select('name')->where('id',$product->category_id)->first();
        //     $productsData[$key]->category_id = $catName->name;
        // }
        return $productsData;
    }

    public function headings(): array{
        return['category_id','product_name','description','model_name','model_number','browse_type','sim_type','hybrid_sim_slot','touch_screen','otg_compatible','display_size','resolution','resolution_type','other_display_features','operating_system','processor_type','processor_core','primary_clock_speed','secondary_clock_speed','operating_frequency','supported_memory_card_type','memory_card_slot_type','primary_camera_available','primary_camera','primary_camera_features','secondary_camera_available','secondary_camera','secondary_camera_features','flash','dual_camera_lens','network_type','supported_networks','internet_connectivity','gprs','pre_installed_browser','micro_usb_port','blutooth_support','blutooth_version','wifi','wifi_version','usb_connectivity','audio_jack','touchscreen_type','sim_size','sensors','other_features','gps_type','fm_radio','audio_format','video_format','battery_capacity','width','height','depth','weight','warranty'];
    }
}
