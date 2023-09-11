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
        Schema::create('jobreport', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('branch_code');
            $table->string('clientrep_name');
            $table->string('clientrep_number');
            $table->string('site_address');
            $table->string('site_state');
            $table->string('fse_assigned');
            $table->string('job_type');
            $table->string('job_description');
            $table->date('visit_date');
            $table->string('equipment_type');
            $table->string('equipment_brand');
            $table->string('equipment_capacity');
            $table->string('serial_no');
            $table->string('date_installed');
            $table->longText('snmp_status');
            $table->string('battery_spec');
            $table->string('battery_qty');
            $table->string('battery_brand');
            $table->string('msd_voltage');
            $table->string('float_voltage');
            $table->string('charging_amps');
            $table->string('last_battery_replaced');
            $table->string('backup_time');
            $table->string('genrun_time');
            $table->string('phcnrun_time');
            $table->string('load_description');
            $table->string('siteinput_voltage');
            $table->string('siteoutput_voltage');
            $table->string('site_frequency');
            $table->string('avr_brand');
            $table->string('avr_capacity');
            $table->longText('site_diagnosis');
            $table->longText('causes_of_damage');
            $table->longText('recommendations');
            $table->longText('battery_voltage_reading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobreport');
    }
};
