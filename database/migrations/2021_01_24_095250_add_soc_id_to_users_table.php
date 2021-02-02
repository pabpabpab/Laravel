<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVkIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('soc_id', 20)
                ->default('')
                ->comment('id в соцсети');
            $table->enum('auth_type', ['site', 'vkontakte', 'yandex'])
                ->default('site')
                ->comment('Тип используемой авторизации');
            $table->string('avatar', 150)
                ->default('')->comment('Ссылка на аватар');
            $table->index('soc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['soc_id', 'auth_type', 'avatar']);
        });
    }
}
