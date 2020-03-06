<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Widgets\News;

/**
 * Dashboard
 *
 * Modify the WordPress Dashboard
 * Add Floating-Point branding and widgets
 *
 * @package Fp\Fabric
 */
class Dashboard implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'dashboard';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_filter('admin_footer_text', [$this, 'adminFooterText']);
        add_filter('the_generator', [$this, 'theGenerator']);
        add_action('wp_dashboard_setup', [$this, 'dashboardSetup']);

        remove_action('welcome_panel', 'wp_welcome_panel');
    }

    /**
     * Update footer text to use Floating-Point credit
     *
     * @return void
     */
    public function adminFooterText()
    {
        echo 'Website by <a href="https://floating-point.com">Floating-point</a></p>';
    }

    /**
     * Remove Generator
     *
     * @return void
     */
    public function theGenerator()
    {
        return '';
    }

    /**
     * Add Dashboard Widgets
     *
     * @return void
     */
    public function dashboardSetup()
    {
        wp_add_dashboard_widget('fp-news', 'Floating-Point News', [News::class, 'render']);
    }
}
