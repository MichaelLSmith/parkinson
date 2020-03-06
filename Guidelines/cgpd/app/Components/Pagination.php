<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;
/**
 * Pagniation
 *
 * Template tags for Pagination
 *
 * @package Fp\Fabric
 */
class Pagination implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'pagniation';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_filter('next_posts_link_attributes', [$this, 'postLinkAttributes']);
        add_filter('previous_posts_link_attributes', [$this, 'postLinkAttributes']);
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
            'the_pagination' => [$this, 'thePagination'],
            'get_paginiation' => [$this, 'getPaginiation']
        ];
    }

    /**
     * Echo out the HTML from getPagination
     *
     * @param	array<mixed>	$args		Arguments passed to pagination
     * @return	void
     */
    public function thePagination($args = [])
    {
        echo $this->getPagination($args);
    }


    /**
     * Get the HTML for pagination links
     *
     * @param	array<mixed>	$args		Arguments passed to pagination
     * @return	string			Paginiation HTML
     */
    public function getPagination($args = [])
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $navigation = '';

        if ($GLOBALS['wp_query']->max_num_pages > 1) {
            $args = wp_parse_args($args, [
            'prev_text' => 'Next',
            'next_text' => 'Previous',
            'screen_reader_text' => 'Posts navigation',
        ]);

            $next_link = get_previous_posts_link($args['next_text']);
            $prev_link = get_next_posts_link($args['prev_text']);

            if ($next_link) {
                $navigation .= '<li class="page-item">' . $next_link . '</li>';
            } else {
                $navigation .= '<li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>';
            }

            $navigation .= '<li class="page-item disabled"><span class="page-link">' . $paged . ' of ' . $GLOBALS['wp_query']->max_num_pages . '</span></li>';

            if ($prev_link) {
                $navigation .= '<li class="page-item">' . $prev_link . '</li>';
            } else {
                $navigation .= '<li class="page-item disabled"><a href="#" class="page-link">Next</a></li>';
            }

            $navigation = '<ul class="pagination justify-content-center mb-5 mt-5 w-100">' . $navigation . '</ul>';
        }

        return $navigation;
    }

    /**
     * Get the attributes for pagination links
     *
     * @return	string		HTML element attributes
     */
    public function postLinkAttributes()
    {
        return 'class="page-link"';
    }
}
