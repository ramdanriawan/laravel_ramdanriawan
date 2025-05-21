<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('profilePicture')->nullable();
            $table->string('password');
            $table->enum('level', ['admin'])->default('admin');
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('active');
            $table->string('remember_token')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->timestamp('deletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
