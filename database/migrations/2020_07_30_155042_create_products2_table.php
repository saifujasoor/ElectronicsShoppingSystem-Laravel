<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('image');
            $table->text('description');
            $table->string('model_name');
            $table->string('model_number');
            $table->string('browse_type');
            $table->string('sim_type');
            $table->string('hybrid_sim_slot');
            $table->string('touch_screen');
            $table->string('otg_compatible');
            $table->string('display_size');
            $table->string('resolution');
            $table->string('resolution_type');
            $table->text('other_display_features');
            $table->string('operating_system');
            $table->string('processor_type');
            $table->string('processor_core');
            $table->string('primary_clock_speed');
            $table->string('secondary_clock_speed');
            $table->string('operating_frequency');
            $table->string('supported_memory_card_type');
            $table->string('memory_card_slot_type');
            $table->string('primary_camera_available');
            $table->string('primary_camera');
            $table->text('primary_camera_features');
            $table->string('secondary_camera_available');
            $table->string('secondary_camera');
            $table->text('secondary_camera_features');
            $table->string('flash');
            $table->string('dual_camera_lens');
            $table->string('network_type');
            $table->string('supported_networks');
            $table->string('internet_connectivity');
            $table->string('gprs');
            $table->text('pre_installed_browser');
            $table->string('micro_usb_port');
            $table->string('blutooth_support');
            $table->string('blutooth_version');
            $table->string('wifi');
            $table->string('wifi_version');
            $table->string('usb_connectivity');
            $table->string('audio_jack');
            $table->string('touchscreen_type');
            $table->string('sim_size');
            $table->string('sensors');
            $table->text('other_features');
            $table->string('gps_type');
            $table->string('fm_radio');
            $table->string('audio_format');
            $table->string('video_format');
            $table->string('battery_capacity');
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('weight');
            $table->string('warranty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
