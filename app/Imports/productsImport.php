<?php

namespace App\Imports;

use App\Product;
use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class productsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $data)
    {
        return new Product([
            'category_id'=>$data['category_id'],
            'product_name'=>$data['product_name'],
            'description'=>$data['description'],
            'image'=>"noimage.jpg",
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

        ]);
    }
}
