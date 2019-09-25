<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArcheiveProscpect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adherents', function (Blueprint $table) {
            $table->boolean('archive')->default(0);
            $table->date('archived_at')->nullable();
            $table->boolean('prospect')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adherents', function (Blueprint $table) {
            $table->dropColumn('archive','archived_at','prospect');
        });
    }
}
