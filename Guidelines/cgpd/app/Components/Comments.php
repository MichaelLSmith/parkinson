<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Comments
 *
 * This mostly serves as a way to remove comment support
 *
 * @package Fp\Fabric
 */
class Comments implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'comments';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('init', [$this, 'removeSupport']);
        add_action('admin_menu', [$this, 'removeMenu']);
    }

    /**
     * Remove comment support
     *
     * @return void
     */
    public function removeSupport()
    {
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            remove_post_type_support($post_type, 'comments');
        }
    }

    /**
     * Remove comments from the admin menu
     *
     * @return void
     */
    public function removeMenu()
    {
        remove_menu_page('edit-comments.php');
        remove_submenu_page('options-general.php', 'options-discussion.php');
    }
}
