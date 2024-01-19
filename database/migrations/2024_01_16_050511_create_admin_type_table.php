<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_type', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->comment("Name, which type admin is registered");
            $table->tinyInteger('status')->comment("1:Super Admin, 2:Admin, 3:Order Admin, 4:Data Entry, 5:Grossory Department Head, 6:Medical Department Head, 7:Marketing, 8:Operations Management, 9:Accounting and Finance, 10:Research and Development (R&D), 11:Production Head")->default("2")->unsigned();
            $table->string('ip_address', 100)->comment("Admin ip address details");
            $table->integer('created_by')->comment("Whom's create new admin account")->nullable();
            $table->integer('updated_by')->comment("Whom's updated admin account details")->nullable();
            $table->integer('deleted_by')->comment("Whom's deleted admin account")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_type');
    }
};
