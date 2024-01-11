<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lname', 100)->nullable();
            $table->string('username', 100);
            $table->integer('role')->comment("1:Super Admin, 2:Admin, 3:Order Admin, 4:Data Entry, 5:Grossory Department Head, 6:Medical Department Head, 7:Marketing, 8:Operations Management, 9:Accounting and Finance, 10:Research and Development (R&D), 11:Production Head")->default("2")->unsigned();
            $table->string('phone', 12);
            $table->string('gender', 12)->nullable()->comment("1=Male, 2=Female, 3=Other");
            $table->string('fax', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('bussiness_name',100)->nullable();
            $table->string('bank_name',100)->nullable();
            $table->string('acc_no',25)->nullable();
            $table->string('ifsc_code',20)->nullable();
            $table->string('aadhar_card',20)->nullable();
            $table->string('gst_no',20)->nullable();
            $table->string('id_proof',20)->nullable();
            $table->string('udyam_cert',20)->nullable();
            $table->string('pincode', 6)->nullable();
            $table->string('email')->unique();
            $table->integer('status')->comment("1:Active, 2:Deactive, 3:Pending, 4:Rejected")->default("3")->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('login_status')->comment("1:Login, 2:Logout")->default("2")->unsigned();
            $table->string('password');
            $table->string("access_token",255);
            $table->rememberToken();
            $table->timestamps();
            $table->timestamps("last_seen")->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
