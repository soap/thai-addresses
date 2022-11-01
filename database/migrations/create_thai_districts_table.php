<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {      
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->id();

            // add fields
            $table->string('code');
            $table->string('name_th');
            $table->string('name_en');
            $table->foreignId($this->getForeignKey());

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->getTable());
    }

    private function getTable()
    {
        return config('thai-addresses.district.table_name');
    }

    private function getForeignKey()
    {
        return config('thai-addresses.province.foreign_key');
    }
};
