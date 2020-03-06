<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;

/**
 * Template
 *
 * Cleanup the base template PHP/HTML
 *
 * @package Fp\Fabric
 */
class Template implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'template';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        // Get rid of a bunch of unecessary wp_head items
        $this->cleanHead();
        $this->hierarchy();

        add_filter('body_class', [$this, 'bodyClass']);
        add_filter('excerpt_more', [$this, 'a11yExcerpt']);
        add_filter('get_the_archive_title', ['archiveTitle']);
        add_filter('embed_oembed_html', [$this, 'responsiveEmbed'], 10, 3);
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
            'get_page_part' => [$this, 'getPagePart'],
            'get_header' => [$this, 'getHeader'],
            'get_footer' => [$this, 'getFooter'],
            'get_sidebar' => [$this, 'getSidebar'],
            'get_template_part' => [$this, 'getTemplatePart']
        ];
    }

    /**
     * Get a Before of after page part
     *
     * @param	string		$location	Where the page part is located
     * @return	void
     */
    public function getPagePart($location)
    {
        global $post;
        if (locate_template('templates/page-parts/' . $post->post_name . '-' . $location . '.php') != '') {
            get_template_part('templates/page-parts/' . $post->post_name, $location);
        }
    }

    /**
     * Retrive the WordPress header
     *
     * @since	2.0.0
     * @param	string|null		$name		Name of the header file
     * @return	void
     */
    public function getHeader($name = null)
    {
        do_action('get_header', $name);
        $this->getPartial('header', $name);
    }

    /**
     * Retrive the WordPress footer
     *
     * @since	2.0.0
     * @param	string|null		$name		Name of the footer file
     * @return	void
     */
    public function getFooter($name = null)
    {
        do_action('get_footer', $name);
        $this->getPartial('footer', $name);
    }

    /**
     * Retrive a WordPress sidebar
     *
     * @since	2.0.0
     * @param	string|null		$name		Name of the sidebar file
     * @return	void
     */
    public function getSidebar($name = null)
    {
        do_action('get_sidebar', $name);
        $this->getPartial('sidebar', $name);
    }

    /**
     * Retrive the WordPress footer
     *
     * @since	2.0.0
     * @param	string			$slug		Slug of file to retrieve
     * @param	string|null		$name		Name of the sidebar file
     * @return	void
     */
    public function getTemplatePart($slug, $name = null)
    {
        \get_template_part('templates/template-parts/' . $slug, $name);
    }

    /**
     * Get a partial from the templates/ directory
     *
     * @since	2.0.0
     * @param	string			$type		The type of partial to get (header, footer, sidebar)
     * @param	string|null		$name		The partials name
     * @return	void
     */
    private function getPartial($type, $name = null)
    {
        $templates = [];

        if (null !== $name) {
            $templates[] = "templates/{$type}-{$name}.php";
            $templates[] = "{$type}-{$name}.php";
        }

        $templates[] = "templates/{$type}.php";
        $templates[] = "{$type}.php";

        locate_template($templates, true, false);
    }

    /**
     * Add the post type to the body class
     *
     * @return array<string>	Classes for the body element
     */
    public function bodyClass()
    {
        $classes = [];

        if (is_front_page()) {
            $classes[] = 'front-page';
        } elseif (is_home() || is_archive()) {
            $classes[] = 'archive';
            $classes[] = 'archive--' . get_post_type();
        } elseif (is_search()) {
            $classes[] = 'search';
        } else {
            $classes[] = get_post_type();
            $classes[] = get_post_type() . '--' . get_the_ID();
        }

        return $classes;
    }

    /**
     * Make the excerpt more link more accessible
     *
     * @param	string		$more		Exisiting more HTML
     * @return	string		New more HTML
     */
    public function a11yExcerpt($more)
    {
        return sprintf(
            '&hellip; <a class="text-nowrap" href="%s">Continue reading<span class="sr-only"> %s</span></a>',
            get_permalink(get_the_ID()),
            get_the_title()
        );
    }

    /**
     * Update the archive title
     *
     * @param	string		$title		Exisiting title
     * @return	string		The new archive title
     */
    public function archiveTitle($title)
    {
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = get_the_author();
        } elseif (is_year()) {
            $title = get_the_date('Y');
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_day()) {
            $title = get_the_date('F j, Y');
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $title = single_term_title('', false);
        } else {
            $title = 'Archives';
        }

        return $title;
    }

    /**
     * Make the oembed code Bootstrap responsive
     *
     * @param	string	$html		HTML for the embed
     * @param	string	$url		URL being embeded
     * @param	array	$attr		Attributes
     * @return	string	New HTML
     */
    public function responsiveEmbed($html, $url, $attr)
    {
        return '<div class="embed-responsive embed-responsive-16by9 mb-3">' . $html . '</div>';
    }

    /**
     * Remove unecessary wp_head items
     *
     * @return void
     */
    private function cleanHead()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
        remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
        remove_action('wp_head', 'wp_generator'); //removes meta name generator.
        remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
        remove_action('wp_head', 'feed_links', 2); //removes feed links.
        remove_action('wp_head', 'feed_links_extra', 3);  //removes comments feed.
    }

    /**
     * Update the template hierarchy to look in templates/ folder
     *
     * @since	2.0.0
     * @return void
     */
    private function hierarchy()
    {
        $types = [
            '404',
            'archive',
            'attachment',
            'author',
            'category',
            'date',
            'embed',
            'frontpage',
            'home',
            'index',
            'page',
            'paged',
            'search',
            'single',
            'singular',
            'tag',
            'taxonomy',
        ];

        foreach ($types as $type) {
            add_filter("{$type}_template_hierarchy", [$this, 'addTemplateDirectory']);
        }
    }

    /**
     * Add the template directory to the template hierarchy
     *
     * @param	array	$templates		Accepted template files
     * @return	array	New template files
     */
    public function addTemplateDirectory(array $templates)
    {
        return \call_user_func_array(
            'array_merge',
            array_map(function ($template) {
                return ["templates/{$template}", $template];
            }, $templates)
        );
    }
}
