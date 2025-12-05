<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewDatasTable extends Migration
{
    public function up()
    {
        Schema::create('view_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
