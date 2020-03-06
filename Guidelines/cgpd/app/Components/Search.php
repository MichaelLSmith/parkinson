<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Search
 *
 * Makes WordPress search a little better 🤓
 *
 * @package Fp\Fabric
 */
class Search implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'search';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_filter('posts_join', [$this, 'joinPostMeta']);
        add_filter('posts_where', [$this, 'wherePostMeta']);
        add_filter('post_distinct', [$this, 'preventDuplicates']);
    }

    /**
     * Join postmeta table
     *
     * @param	string		$join		Exisiting JOIN statement
     * @param	string		New JOIN statement
     */
    public function joinPostMeta($join)
    {
        global $wpdb;

        if (is_search()) {
            $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
        }

        return $join;
    }

    /**
     * Add postmeta to the WHERE clause
     *
     * @param	string		$where		Exisiting WHERE statement
     * @param	string		New WHERE statement
     */
    public function wherePostMeta($where)
    {
        global $pagenow, $wpdb;

        if (is_search()) {
            $where = preg_replace(
                "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)",
                $where
            );
        }

        return $where;
    }

    /**
     * Prevent duplicates from appearing in search results
     *
     * @param	string		$where		Exisiting WHERE statement
     * @param	string		New WHERE statement
     */
    public function preventDuplicates($where)
    {
        global $wpdb;

        if (is_search()) {
            return "DISTINCT";
        }

        return $where;
    }
}
