<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;

/**
 * Editor
 *
 * Modify the Editor slightly
 * Remove some support and protect from some common mistakes
 *
 * @package Fp\Fabric
 */
class Editor implements ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'editor';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        add_action('wp_insert_post_data', [$this, 'removeEmptyTags'], 99, 2);
        add_action('enqueue_block_editor_assets', [$this, 'editorStyles']);

        // Remove Audio and Video Playlists
        add_filter('media_library_show_audio_playlist', [$this, 'removePlaylist']);
        add_filter('media_library_show_video_playlist', [$this, 'removePlaylist']);

        add_filter('media_view_strings', [$this, 'removeMediaStrings']);
    }

    /**
     * Remove Empty Paragraphs and Headings
     *
     * @param	array<mixed>	$data
     * @param	array<mixed>	$postArr
     * @return	array<mixed>	Updated post data
     */
    public function removeEmptyTags($data, $postArr)
    {
        $data['post_content'] = str_replace("\n&nbsp;", "", $data['post_content']);
        $data['post_content'] = preg_replace('/<h[1-6]><\/h[1-6]>/', '', $data['post_content']);

        return $data;
    }

    /**
     * Remove a Playlist item from Media Library
     *
     * @return	null
     */
    public function removePlaylist()
    {
        return null;
    }

    /**
     * Remove URL, Playlist, view strings
     *
     * @param	array<string>	$strings
     * @return	array<string>
     */
    public function removeMediaStrings($strings)
    {
        $strings["insertFromUrlTitle"] = "";
        $strings['createPlaylistTitle'] = "";
        $strings['createVideoPlaylistTitle'] = "";

        return $strings;
    }

    /**
     * Add Styles to the block editor
     *
     * @return void
     */
    public function editorStyles()
    {
        wp_enqueue_style('gutenbergthemeblocks-style', get_template_directory_uri() . '/style.css');
    }
}
