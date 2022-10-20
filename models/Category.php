<?php namespace MoonWalkerz\Gestio\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'moonwalkerz_gestio_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
