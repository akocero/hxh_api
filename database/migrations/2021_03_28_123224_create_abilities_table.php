<?php

use App\Models\Ability;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('table_name');
            $table->text('details');
            $table->timestamps();
        });


        Ability::create([
            "name" => "post:list",
            "table_name" => "posts",
            "details" => "get all posts"
        ]);

        Ability::create([
            "name" => "post:show",
            "table_name" => "posts",
            "details" => "get all posts"
        ]);

        Ability::create([
            "name" => "post:store",
            "table_name" => "posts",
            "details" => "get all posts"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abilities');
    }
}
