<?php namespace MoonWalkerz\Gestio\Models;

use Model;

/**
 * Model
 */
class Customer extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'moonwalkerz_gestio_customers';

    public $fillable = ['name','address','zip','city','state','vat','cf','cd','ateco'];
    
    public $jsonable =['phones','emails'];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsToMany = [
        'categories'=> [
            'MoonWalkerz\Gestio\Models\Category',
            'table'    => 'moonwalkerz_gestio_customers_categories',
            'key'      => 'customer_id',
            'otherKey' => 'category_id'
            ]
    ];

    public function getStates() {
        return $this->distinct()->pluck('state','state')->toArray();
    }

    public function getCities() {
        return $this->distinct()->pluck('city','city')->toArray();
    }
}
