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
            "name" => "post:read",
            "table_name" => "posts",
            "details" => "read all or single post"
        ]);

        Ability::create([
            "name" => "post:create",
            "table_name" => "posts",
            "details" => "create post"
        ]);

        Ability::create([
            "name" => "post:update",
            "table_name" => "posts",
            "details" => "update post"
        ]);

        Ability::create([
            "name" => "post:delete",
            "table_name" => "posts",
            "details" => "delete post"
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
