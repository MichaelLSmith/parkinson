<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;

/**
 * Support for Breadcrumbs
 *
 * @package Fp\Fabric
 */
class Breadcrumbs implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'breadcrumbs';
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
            'get_breadcrumbs' => [ $this, 'getBreadcrumbs' ],
            'the_breadcrumbs' => [ $this, 'theBreadcrumbs' ]
        ];
    }

    /**
     * Echo the HTML from get_breadcrumbs
     *
     * @param 	string		$homeIcon			A custom home icon to be shown
     * @param	string		$customPostType		Custom post types added to the breadcrumbs
     * @return	void
     */
    public function theBreadcrumbs($homeIcon = false, $customPostType = false)
    {
        echo $this->getBreadcrumbs();
    }

    /**
     * Get the HTML for breadcrumbs
     *
     * @param 	string		$homeIcon			A custom home icon to be shown
     * @param	string		$customPostType		Custom post types added to the breadcrumbs
     * @return	string		HTML string
     */
    public function getBreadcrumbs($homeIcon = false, $customPostType = false)
    {
        wp_reset_query();
        global $post;

        $breadcrumbs = '';

        $isCustomPostType = $customPostType ? is_singular($customPostType) : false;

        if (! is_front_page() && ! is_home()) {
            $breadcrumbs .= sprintf(
                '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
                get_option('home'),
                $homeIcon ? $homeIcon : get_bloginfo('name')
            );

            if (has_category()) {
                $breadcrumbs .= sprintf(
                    '<li class="breadcrumb-item active"><a href="%s">%s</a></li>',
                    esc_url(get_permalink(get_page(get_the_category($post->ID)))),
                    get_the_category(', ')
                );
            }

            if (is_category() || is_single() || $isCustomPostType) {
                if (is_category()) {
                    $breadcrumbs .= sprintf(
                        '<li class="breadcrumb-item active"><a href="%s">%s</a></li>',
                        esc_url(get_permalink(get_page(get_the_category($post->ID)))),
                        get_the_category($post->ID)[0]->name
                    );
                }

                if ($isCustomPostType) {
                    $breadcrumbs .= sprintf(
                        '<li class="breadcrumb-item active"><a href="%s/%s">%s</a></li>',
                        get_option('home'),
                        get_post_type_object(get_post_type($post))->rewrite['slug'],
                        get_post_type_object(get_post_type($post))->label
                    );

                    if ($post->post_parent) {
                        $home = get_page(get_option('page_on_front'));

                        for ($i = count($post->ancestors) - 1; $i >= 0; $i--) {
                            if ($home->ID != $post->ancestors[$i]) {
                                $breadcrumbs .= sprintf(
                                    '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
                                    get_permalink($post->ancestors[$i]),
                                    get_the_title($post->ancestors[$i])
                                );
                            }
                        }
                    }
                }

                if (is_single()) {
                    $breadcrumbs .= sprintf(
                        '<li class="breadcrumb-item active">%s</li>',
                        get_the_title($post->ID)
                    );
                }
            } elseif (is_page() && $post->post_parent) {
                $home = get_page(get_option('page_on_front'));

                for ($i = count($post->ancestors) - 1; $i >= 0; $i--) {
                    if ($home->ID != $post->ancestors[$i]) {
                        $breadcrumbs .= sprintf(
                            '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
                            get_permalink($post->ancestors[$i]),
                            get_the_title($post->ancestors[$i])
                        );
                    }
                }

                $breadcrumbs .= sprintf(
                    '<li class="breadcrumb-item active">%s</li>',
                    get_the_title($post->ID)
                );
            } elseif (is_page()) {
                $breadcrumbs .= sprintf(
                        '<li class="breadcrumb-item active">%s</li>',
                        get_the_title($post->ID)
                    );
            } elseif (is_404()) {
                $breadcrumbs .= '<li class="breadcrumb-item active">404</li>';
            }

            $breadcrumbs = '<ol class="breadcrumb">' . $breadcrumbs . '</ol>';
        }
        return $breadcrumbs;
    }
}
