<?php

namespace MoonWalkerz\Gestio;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'gestio',
            'description' => 'Gestio',
            'author'      => 'MoonWalkerz',
            'icon'        => 'icon-leaf'
        ];
    }
    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
    }

  
}
