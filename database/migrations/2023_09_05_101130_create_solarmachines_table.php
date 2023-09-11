<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solarmachines', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('branch_code');
            $table->string('bm_name');
            $table->string('bm_number');
            $table->string('branch_address');
            $table->string('branch_state');
            $table->string('fse_assigned');
            $table->string('remarks');
            $table->string('inverter_brand');
            $table->string('inverter_capacity');
            $table->string('snmp_status');
            $table->string('battery_spec');
            $table->string('battery_qty');
            $table->string('battery_brand');
            $table->string('number_of_atms');
            $table->string('solarpanel_type');
            $table->string('solarpanel_capacity');
            $table->string('solarpanel_number');
            $table->string('charge_controller'); 
            $table->string('number_of_inverter');
            $table->string('date_inverter_deployed'); 
            $table->string('inverter_age');
            $table->string('last_battery_replaced');
            $table->string('inverter_deployed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solarmachines');
    }
};
