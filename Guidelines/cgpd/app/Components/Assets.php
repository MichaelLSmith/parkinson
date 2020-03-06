<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;

/**
 * Assets
 *
 * Template tags to access assets
 *
 * @package Fp\Fabric
 */
class Assets implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'assets';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        // PASS: Currently only has template tags
    }

    /**
     * Get exposed template tags
     *
     * @return	array	Associative array containing template tags
     * 					$method => $callback
     */
    public function templateTags() : array
    {
        return [
            'asset_uri' => [$this, 'getAssetUri'],
            'asset_dir' => [$this, 'getAssetDir']
        ];
    }

    /**
     * Get an asset Uri
     *
     * @param	string		$path		The relative path to the Asset directory
     * @return	string		Uri to the asset
     */
    public function getAssetUri($path = '')
    {
        return get_template_directory_uri() . '/assets/' . $path;
    }

    /**
     * Get an asset directory path
     *
     * @param	string		$path		The relative path to the Asset directory
     * @return	string		Uri to the asset
     */
    public function getAssetDir($path = '')
    {
        return get_template_directory() . '/assets/' . $path;
    }
}
