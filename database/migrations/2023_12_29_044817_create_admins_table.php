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
            $table->id()->comment("Admin Id in primary key");
            $table->unsignedBigInteger("admin_types_id");
            // $table->foreign("admin_types_id")->references("id")->on("admin_type")->comment("This column defined which type of admin is used (e.g SuperAdmin/Admin)")->unsigned();
            $table->string('name')->comment("Admin First Name details");
            $table->string('lname', 100)->nullable()->comment("Admin last Name details");
            $table->string('username', 100)->comment("Admin Username details");
            $table->tinyInteger('role')->comment("1:Super Admin, 2:Admin, 3:Order Admin, 4:Data Entry, 5:Grossory Department Head, 6:Medical Department Head, 7:Marketing, 8:Operations Management, 9:Accounting and Finance, 10:Research and Development (R&D), 11:Production Head")->default("2")->unsigned();
            $table->string('phone', 12)->comment("Admin Contact details");
            $table->string('gender', 12)->comment("")->nullable()->comment("1=Male, 2=Female, 3=Other");
            $table->string('fax', 100)->comment("")->nullable();
            $table->text('landmark')->comment("Admin landmark details")->nullable();
            $table->text('address')->comment("Admin address details")->nullable();
            $table->string('city', 50)->comment("Admin city details")->nullable();
            $table->string('state', 50)->comment("Admin state details")->nullable();
            $table->string('country', 50)->comment("Admin country details")->nullable();
            $table->string('aadhar_card',20)->comment("Admin aadhar card details")->nullable();
            $table->string('id_proof',20)->comment("Admin id proof details")->nullable();
            $table->string('pincode', 6)->comment("Admin pincode details")->nullable();
            $table->dateTime("leaving_date");
            $table->tinyInteger('status')->comment("1:Active, 2:Deactive, 3:Pending, 4:Rejected")->default("3")->unsigned();
            $table->integer('region_id')->comment("Area Region status where admin is logged in")->unsigned()->nullable();
            $table->integer('zone_id')->comment("City/State Region status where admin is logged in")->unsigned()->nullable();
            $table->integer('has_reporting_manager')->comment("1:Super Admin, 2:Admin")->default("1")->unsigned();
            $table->string('ip_address',50)->comment("Admin System id address");
            $table->string('email',255)->comment("")->unique();
            $table->string('email_type',255)->references("id")->on("admin_email")->comment("This column defined which type of admin email (e.g SuperAdmin/Admin)")->nullable();
            $table->tinyInteger('should_verify_email')->comment("1:Email Verify by Admin User, 2:Email not Verify till now")->default("2")->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('login_count')->comment("1:Admin successfully logged In, 2:If admin 3 times attemped wrong email or password then he will block 30 min")->default("1")->unsigned();
            $table->integer('block_time')->comment("1:Admin successfully logged In, 2:If admin 3 times submit wrong password then he will block 30 min")->default("1")->unsigned();
            $table->integer('login_status')->comment("1:Login, 2:Logout")->default("2")->unsigned();
            $table->integer('login_mode')->comment("1:Third party login functionality (e.g Mail/Facebook/Google/..), 2:Web based means login by it own account")->default("1")->unsigned();
            $table->integer('last_login_mode')->comment("1:Last time third party login functionality (e.g Mail/Facebook/Google/..), 2:Web based means login by it own account")->default("1")->unsigned();
            $table->integer('last_login_from')->comment("1:Login by System/Computer, 2:Login by Mobile")->default("1")->unsigned();
            $table->integer('is_currently_logged_in')->comment("1:Admin Currently logged in, 2:Admin currently not logged in")->default("1")->unsigned();
            $table->tinyInteger('master_password')->comment("1:First time when super create an admin account that time using password, 2:After register when admin itself change password")->default("1")->unsigned();
            $table->string('default_password', 100)->comment("First time used this password when super admin register an admin account");
            $table->string('old_password_1')->comment("")->nullable();
            $table->string('old_password_2')->comment("")->nullable();
            $table->string('old_password_3')->comment("")->nullable();
            $table->string('password');
            $table->dateTime("password_modified_at")->nullable();
            $table->tinyInteger("is_communication_consent")->comment("1:Message recieved by email, 2:Message recieved by sms")->default("1")->unsigned();
            $table->string("access_token",255);
            $table->rememberToken();
            $table->integer("created_by")->unsigned()->nullable();
            $table->timestamps();
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
