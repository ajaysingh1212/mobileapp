<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('alternate_number')->nullable();
            $table->string('pin_code');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->longText('full_address')->nullable();
            $table->string('debit_card')->nullable();
            $table->string('expiry_month')->nullable();
            $table->string('cvv')->nullable();
            $table->string('customer');
            $table->string('password');
            $table->string('bank_account_number')->nullable();
            $table->string('cif_number')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('atm_pin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
