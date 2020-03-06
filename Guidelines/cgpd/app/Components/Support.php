<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Support
 *
 * Set the base theme supports
 *
 * @package Fp\Fabric
 */
class Support implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'support';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('after_setup_theme', [$this, 'themeSetup']);
    }

    /**
     * Setup the theme and its supports
     *
     * @return void
     */
    public function themeSetup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        add_theme_support('align-wide');

        add_theme_support('editor-color-palette', \Fp\Fabric\fabric()->config('theme.colours'));

        // Disables custom colors in block color palette.
        add_theme_support('disable-custom-colors');
    }
}
