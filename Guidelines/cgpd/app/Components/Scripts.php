<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Scripts
 *
 * Register / Enqueue scripts/styles with WordPress here
 *
 * @package Fp\Fabric
 */
class Scripts implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'scripts';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'scripts'], 9999);
        add_action('wp_enqueue_scripts', [$this, 'styles'], 9999);
    }

    /**
     * Register Javascript files
     *
     * @return void
     */
    public function scripts()
    {
        wp_enqueue_script('jquery');

        wp_enqueue_script(
            'vendor-fontawesome',
            get_template_directory_uri() . '/dist/vendors~fontawesome.bundle.js',
            null,
            filemtime(get_template_directory() . '/dist/vendors~fontawesome.bundle.js'),
            true
        );

        wp_enqueue_script(
            'fontawesome',
            get_template_directory_uri() . '/dist/fontawesome.bundle.js',
            ['vendor-fontawesome'],
            filemtime(get_template_directory() . '/dist/fontawesome.bundle.js'),
            true
        );

        wp_enqueue_script(
            'vendor-bootstrap',
            get_template_directory_uri() . '/dist/vendors~bootstrap.bundle.js',
            null,
            filemtime(get_template_directory() . '/dist/vendors~bootstrap.bundle.js'),
            true
        );

        wp_enqueue_script(
            'bootstrap',
            get_template_directory_uri() . '/dist/bootstrap.bundle.js',
            ['vendor-bootstrap'],
            filemtime(get_template_directory() . '/dist/bootstrap.bundle.js'),
            true
        );

        wp_enqueue_script(
            'script',
            get_template_directory_uri() . '/dist/script.js',
            ['jquery', 'fontawesome', 'bootstrap' ],
            filemtime(get_template_directory() . '/dist/script.js'),
            true
        );

        wp_localize_script('script', 'wpvars', [
            'site_url'		=> site_url(),
            'template_url'	=> get_template_directory_uri()
        ]);
    }

    /**
     * Register CSS files
     *
     * @return void
     */
    public function styles()
    {
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', null, filemtime(get_template_directory() . '/style.css'), 'all');
    }
}
