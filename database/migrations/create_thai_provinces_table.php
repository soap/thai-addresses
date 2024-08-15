<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

return new class extends Migration
{
    public function up()
    {
        Schema::create(ThaiAddresses::getProvinceTableName(), function (Blueprint $table) {

            $table->id();
            // add fields
            $table->string('code');
            $table->string('name_th');
            $table->string('name_en');
            $table->foreignId(ThaiAddresses::getGeographyForeignKeyName());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(ThaiAddresses::getProvinceTableName());
    }
};
