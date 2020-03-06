<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Images
 *
 * Modify how WordPress handles images
 *
 * @package Fp\Fabric
 */
class Images implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'images';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('after_theme_setup', [$this, 'addImageSizes']);
        add_filter('post_gallery', [$this, 'postGallery'], 10, 3);
        add_filter('image_send_to_editor', [$this, 'lazyLoading'], 10, 1);
    }

    /**
     * Add new images sizes to WordPress
     *
     * @return void
     */
    public function addImageSizes()
    {
        add_image_size('x-large', 1920, 1080, false);
    }

    /**
     * Modify the core Gallery for Bootstrap Flexbox
     *
     * @param	string		$output		The original Output string
     * @param	mixed		$attrs		Attributes of the gallery
     * @param	mixed		$instance	The Gallery instance
     * @return	string		The new output
     */
    public function postGallery($output = '', $atts, $instance)
    {
        $result = $this->getGalleryContent($atts);

        if (! empty($result)) {
            return '<div class="fp-gallery row justify-content-center">' . $result . '</div>';
        }

        return $output;
    }

    /**
     * Get the gallery content from attributes
     *
     * @param	array<mixed>	$atts	Gallery attributes
     * @return 	string			New output
     */
    private function getGalleryContent($atts)
    {
        $output = '';

        $attachments = get_posts([
            'include' => $atts['include'],
            'post_status' => 'inherit',
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => 'ASC',
            'orderby' => 'post__in'
        ]);

        if (! empty($attachments)) {
            foreach ($attachments as $attachment) {
                $output .= sprintf(
                    '
					<div class="col-lg-2 col-md-3 col-sm-4 col-6">
						<button class="btn-gallery" style="background-image: url(%s)" data-src="%s" data-sub-html="%s" role="presentation"></button>
					</div>',
                    wp_get_attachment_image_src($attachment->ID, 'medium')[0],
                    wp_get_attachment_image_src($attachment->ID, 'x-large')[0],
                    wp_get_attachment_caption($attachment->ID)
                );
            }
        }

        return $output;
    }

    /**
     * Adds Support for Chrome 76 lazy loading
     *
     * @since	2.0.1
     * @param	string		$html	Image HTML
     * @return	string		Modified image html
     */
    public function lazyLoading($html)
    {
        return str_replace('<img src', \sprintf('<img loading="lazy" src'), $html);
    }
}
