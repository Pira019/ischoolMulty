<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $columns = 'Tables_in_' . env('DB_DATABASE');//This is just to read the object by its key, DB_DATABASE is database name.
        $tables = DB::select('SHOW TABLES');

        foreach ( $tables as $table ) {
            //todo add it to laravel jobs, process it will queue as it will take time.
            Schema::table($table->$columns, function (Blueprint $table) {
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $columns = 'Tables_in_' . env('DB_DATABASE');//This is just to read the object by its key, DB_DATABASE is database name.
        $tables = DB::select('SHOW TABLES');

        foreach ( $tables as $table ) {
            //todo add it to laravel jobs, process it will queue as it will take time.
            Schema::table($table->$columns, function (Blueprint $table) {
             //   $ $table->timestamps();
            });
        }
    }
}
