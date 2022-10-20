<?php namespace MoonWalkerz\Gestio\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMartinimultimediaCategories extends Migration
{
    public function up()
    {
        Schema::create('moonwalkerz_gestio_categories', function($table)
        {
            $table->engine = 'InnoDB';
            
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();


            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();
            $table->DateTime('created_at')->nullable();
            $table->DateTime('updated_at')->nullable();
        });

    }
    
    public function down()
    {
        Schema::dropIfExists('moonwalkerz_gestio_categories');
    }
}
