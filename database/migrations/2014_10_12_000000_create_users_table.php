<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telp')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->enum('role', ['admin', 'orangtua', 'pendidik']);
            $table->rememberToken();
            $table->timestamps();
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
}
