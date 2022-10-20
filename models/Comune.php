<?php namespace MoonWalkerz\Gestio\Models;

use Model;

/**
 * Model
 */
class Comune extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'moonwalkerz_gestio_comuni';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $fillable = ['cod_reg','cod_ut','name','state','prov','cod_state','cod_cat'];

}
