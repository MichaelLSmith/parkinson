<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Shortcodes
 *
 * Modfiy the content to cleanup some bad shortcodes
 *
 * @package Fp\Fabric
 */
class Shortcodes implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'shortcodes';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_filter('the_content', [$this, 'stripTags'], 10);
    }

    /**
     * Remove surrounding <p> and <br />
     *
     * @param	string		$content		The existing content
     * @return	string		New content
     */
    public function stripTags($content)
    {
        return strtr($content, [
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']',
            ']<br>' => ']'
        ]);
    }
}
