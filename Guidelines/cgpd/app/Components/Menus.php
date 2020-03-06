<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;

/**
 * Menus
 *
 * Add menu template tags and register menus
 *
 * @package Fp\Fabric
 */
class Menus implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'menus';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('after_setup_theme', [$this, 'registerMenus']);
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
            'get_menu' => [$this, 'getNavMenu'],
            'the_menu' => [$this, 'theNavMenu'],
        ];
    }

    /**
     * Register the Navigation Menus
     *
     * @return void
     */
    public function registerMenus()
    {
        register_nav_menus();
    }

    /**
     * Render the main navigation to the page
     *
     * @return	string				HTML for the navigation
     */
    public function theNavMenu()
    {
        echo $this->getNavMenu();
    }

    /**
     * Get the HTML for the main navigation to the page
     *
     * @param	array<strings>		$pages		Pages the be displayed as main items
     * @param	array<strings>		$classes	Classes to add to the navigation
     * @return	string				HTML for the navigation
     */
    public function getNavMenu()
    {
        $menu = wp_get_nav_menu_items(ICL_LANGUAGE_CODE === 'en' ? 'Main' : 'Main - French');
        if (!empty($menu)) {
            return sprintf(
                '<nav class="main-nav">%s</nav>',
                $this->getNavMenuItems($menu)
            );
        }
    }

    /**
     * Get the main items for the navigation menu
     *
     * @param	array<strings>		$pages		Pages the be displayed as main items
     * @return	string				Navigation items HTML
     */
    private function getNavMenuItems($pages)
    {
        $links = '';
        foreach ($pages as $page) {
            $links .= sprintf(
                '
					<div class="main-nav__item">
						<a class="card w-100" href="%s">
							<div class="card-body">
								<p class="card-text">%s</p>
							</div>
						</a>
					</div>
				',
                $page->url,
                $page->title
            );
        }

        return $links;
    }

    /**
     * Get the dropdown links for a submenu
     *
     * @param	array<\WP_Post>		$menu		Array of menu itesm
     * @return	string				HTML for the dropdown links
     */
    public function getDropDownLinks($menu)
    {
        $links = '';

        foreach ($menu as $menuItem) {
            $links .= sprintf(
                '<a class="dropdown-item" href="%s">%s</a>',
                $menuItem->url,
                $menuItem->title
            );
        }

        return $links;
    }
}
