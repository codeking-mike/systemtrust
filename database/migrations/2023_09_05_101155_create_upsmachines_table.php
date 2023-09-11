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
        Schema::create('upsmachines', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('branch_code');
            $table->string('bm_name');
            $table->string('bm_number');
            $table->string('branch_address');
            $table->string('branch_state');
            $table->string('fse_assigned');
            $table->string('remarks');
            $table->string('ups_brand');
            $table->string('ups_capacity');
            $table->string('snmp_status');
            $table->string('battery_capacity');
            $table->string('number_of_batteries');
            $table->string('battery_brand');
            $table->string('load');
            $table->string('year_of_installation');
            $table->string('solarpanel_capacity');
            $table->string('serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upsmachines');
    }
};
