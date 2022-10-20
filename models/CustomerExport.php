<?php namespace MoonWalkerz\Gestio\Models;

use MoonWalkerz\Gestio\Controllers\Customers;

class CustomerExport extends \Backend\Models\ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $c = Customer::all();
        $c->each(function($subscriber) use ($columns) {
            $subscriber->makeVisible($columns);
        });
        
        return $c->toArray();
    }
}

