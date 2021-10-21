<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAgentAndIpAddressColumnsToJwtAuthTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jwt_auth_tokens', function (Blueprint $table) {
            $table->string('ip_address')->after('access_token')->nullable();
            $table->string('user_agent', 500)->after('access_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jwt_auth_tokens', function (Blueprint $table) {
            $table->dropColumn('ip_address');
            $table->dropColumn('user_agent');
        });
    }
}
