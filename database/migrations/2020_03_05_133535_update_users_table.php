<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('email_verified_at');
            $table->string('email')->nullable()->change();
            $table->string('username')
                  ->after('remember_token');
            $table->string('avatar')
                  ->after('username');
            $table->string('bio')
                  ->after('avatar');
            $table->string('provider')
                  ->after('bio');
            $table->string('provider_id')
                  ->after('provider');
            $table->string('social_link')
                  ->after('provider_id');
            $table->softDeletes();
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
            //
        });
    }
}
