<?php namespace MoonWalkerz\Gestio\Classes;

use Backend\Skins\Standard;

/**
 * Modified backend skin information file.
 *
 * This is modified to include an additional path to override the default layouts.
 *
 */

class BackendSkin extends Standard
{
    /**
     * {@inheritDoc}
     */
    public function getLayoutPaths()
    {
        return [base_path() . '/plugins/moonwalkerz/gestio/skins/layouts', $this->skinPath.'/layouts'];
    }
}