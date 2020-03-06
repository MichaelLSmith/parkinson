<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Permissions
 *
 * Restrict some user roles mostly to protect admin roles
 *
 * @package Fp\Fabric
 */
class Permissions implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'permissions';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        //add_filter('editable_roles', [$this, 'restrictEditableRoles']);
        //add_filter('map_meta_cap', [$this, 'restrictAdminRole'], 10, 4);

        // Remove Admin Bar for non-admins
        if (! current_user_can('manage_options')) {
            show_admin_bar(false);
        }
    }

    /**
     * Remove Administrator from Editable roles for non-admins
     *
     * @param	array	$roles		WordPress roles
     * @return	array	Modified Roles
     */
    public function restrictEditableRoles()
    {
        if (isset($roles['administrator']) && !current_user_can('administrator')) {
            unset($roles['administrator']);
        }

        return $roles;
    }

    /**
     * Do not allow non-admins to edit or delete admin accounts
     *
     * @param	array<string>		$caps		Capabilities
     * @param	string				$cap		Capability
     * @param	int					$userId		Current User ID
     * @param	array<mixed>		$args
     * @return array<string>		New Capabilites
     */
    public function restrictAdminRole($caps, $cap, $userId, $args)
    {
        if ($cap == 'edit_user' || $cap == 'remove_user' || $cap == 'promote_user') {
            if (isset($args[0]) && $args[0] == $userId) {
                return $caps;
            } elseif (! isset($args[0])) {
                $caps[] = 'do_not_allow';
            }

            $other = new WP_User(absint($args[0]));

            if ($other->has_cap('administrator')) {
                if (! current_user_can('administrator')) {
                    $caps[] = 'do_not_allow';
                }
            }
        } elseif ($cap == 'delete_user' || $cap == 'delete_users') {
            if (! isset($args[0])) {
                return $caps;
            }

            $other = new WP_User(absint($args[0]));

            if ($other->has_cap('administrator')) {
                if (! current_user_can('administrator')) {
                    $caps[] = 'do_not_allow';
                }
            }
        }

        return $caps;
    }
}
