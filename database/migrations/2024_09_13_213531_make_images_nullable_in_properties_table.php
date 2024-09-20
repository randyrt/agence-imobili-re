<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->string('image1')->nullable()->change();
        $table->string('image2')->nullable()->change();
        $table->string('image3')->nullable()->change();
    });
}

public function down()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->string('image1')->nullable(false)->change();
        $table->string('image2')->nullable(false)->change();
        $table->string('image3')->nullable(false)->change();
    });
}

};
