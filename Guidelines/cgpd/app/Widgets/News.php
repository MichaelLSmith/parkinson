<?php

namespace Fp\Fabric\Widgets;

use Fp\Fabric\Interfaces\RenderableInterface;

/**
 * Support for Breadcrumbs
 *
 * @package Fp\Fabric
 */
class News implements RenderableInterface
{
    /**
     * Echo out HTML String
     *
     * @return void
     */
    public static function render()
    {
        $rss = fetch_feed('https://floating-point.com/feed.xml');
        $maxItems = 0;
        $items = [];

        if (!is_wp_error($rss)) {
            $maxItems = $rss->get_item_quantity(5);
            $items = $rss->get_items(0, $maxItems);
        }

        if ($maxItems == 0) {
            echo '<p>No news to display</p>';
        } else {
            echo '<ul>';
            foreach ($items as $item) {
                printf(
                    '<li><a href="%s" style="display:block; font-weight:bold">%s</a>%s</li>',
                    esc_url($item->get_permalink()),
                    esc_html($item->get_title()),
                    $item->get_date('F j, Y')
                );
            }
            echo '</ul>';
        }
    }
}
