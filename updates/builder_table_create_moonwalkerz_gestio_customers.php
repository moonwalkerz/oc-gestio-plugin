<?php namespace MoonWalkerz\Gestio\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMartinimultimediaGestioCustomers extends Migration
{
    public function up()
    {
        Schema::dropIfExists('moonwalkerz_gestio_customers');
        Schema::create('moonwalkerz_gestio_customers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('market_name')->nullable();
            $table->string('vat')->nullable();
            $table->string('cf')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('region')->nullable();
            $table->text('address')->nullable();
            $table->string('phones')->nullable();
            $table->string('emails')->nullable();
            $table->text('note')->nullable();
            $table->string('pec')->nullable();
            $table->string('sdi')->nullable();
            
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('moonwalkerz_gestio_customers');
    }
}
