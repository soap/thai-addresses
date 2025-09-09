<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Soap\ThaiAddresses\ThaiAddresses;

return new class extends Migration
{
    public function up()
    {
        $table = ThaiAddresses::getSubdistrictTableName();
        Schema::create($table, function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('name_th');
            $table->string('name_en');
            $table->foreignId(ThaiAddresses::getDistrictForeignKeyName());

            $table->timestamps();
        });
    }

    public function down()
    {
        $table = ThaiAddresses::getSubdistrictTableName();
        Schema::dropIfExists($table);
    }
};
