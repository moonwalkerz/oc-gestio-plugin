<?php namespace MoonWalkerz\Gestio\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMartinimultimediaGestioCustomersCategories extends Migration
{
    public function up()
    {
        Schema::dropIfExists('moonwalkerz_gestio_customers_categories');
        Schema::create('moonwalkerz_gestio_customers_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('customer_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['customer_id', 'category_id'],'customers_categories');
        });

    }
    
    public function down()
    {
        Schema::dropIfExists('moonwalkerz_gestio_customers_categories');
    }
}
