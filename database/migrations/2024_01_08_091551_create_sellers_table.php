<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->unsignedBigInteger('user_id')->references('id')->on('users')->unique();
            $table->string('lname', 100)->nullable();
            $table->string('username', 100);
            $table->string('shop_name', 255)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('gender', 12)->nullable()->comment("1=Male, 2=Female, 3=Other");
            $table->string('fax', 100)->nullable();
            $table->text('areaandstreet')->nullable();
            $table->text('landmark')->nullable();
            $table->text('addressproof')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('bussiness_name',100)->nullable();
            $table->string('bank_name',100)->nullable();
            $table->string('account_no',25)->nullable();
            $table->string('ifsc_code',20)->nullable();
            $table->text('aadhar_card')->nullable();
            $table->string('gst_no',20)->nullable();
            $table->text('id_proof')->nullable();
            $table->string('shop_act_lic',20)->nullable();
            $table->string('udyam_cert',20)->nullable();
            $table->string('pincode', 6)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('current_balance')->nullable();
            $table->longText("access_token")->nullable();
            $table->timestamp('email_verified_at');
            $table->integer('otp')->nullable();
            $table->integer('status')->comment("1:Active, 2:Deactive, 3:Pending, 4:Rejected");
            $table->integer('login_status')->comment("1:Login, 2:Logout");
            // $table->timestamp("last_seen_at");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
