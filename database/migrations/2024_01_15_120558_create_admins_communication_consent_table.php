<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('admins_communication_consent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admins")->comment("Admin Id");
            $table->tinyInteger("email_consent")->comment("1 : Email through send message, 2 : Message send by other method")->default("1")->unsigned();
            $table->tinyInteger("sms_consent")->comment("1 : SMS through send message, 2 : Message send by other method")->default("1")->unsigned();
            $table->tinyInteger("whatsapp_consent")->comment("1 : WhatsApp through send message, 2 : Message send by other method")->default("1")->unsigned();
            $table->string("ip_address")->comment("User Ip Address");
            $table->integer('created_by')->comment("Whom's create new admin account")->nullable();
            $table->integer('updated_by')->comment("Whom's updated admin account details")->nullable();
            $table->integer('deleted_by')->comment("Whom's deleted admin account")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('admins_communication_consent');
    }
};
