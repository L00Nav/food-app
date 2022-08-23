<?php

use App\Models\Meal;
use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_menu', function (Blueprint $table) {
            $table->foreignIdFor(Meal::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Menu::class)->constrained()->onDelete('cascade');
            $table->primary(['meal_id', 'menu_id']);

            $table->index('meal_id');
            $table->index('menu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_menu');
    }
};
