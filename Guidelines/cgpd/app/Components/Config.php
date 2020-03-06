<?php

namespace Fp\Fabric\Components;

use Fp\Fabric\Interfaces\ComponentInterface;
use Fp\Fabric\Interfaces\TemplateInterface;
use Fp\Fabric\Repositories\ConfigRepository;

/**
 * Config
 *
 * Add menu template tags and register menus
 *
 * @package Fp\Fabric
 */
class Config implements ComponentInterface, TemplateInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string
    {
        return 'config';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init()
    {
        $this->config = new ConfigRepository([
            'social' => require get_template_directory() . '/config/social.php',
            'theme' => require get_template_directory() . '/config/theme.php'
        ]);
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
            'config' => [$this, 'getConfig'],
        ];
    }

    /**
     * GEt an item from ConfigRepository
     *
     * @param	string		$key		Key of the config value
     * @param	mixed		$default	Default value if key does not exist
     * @return	mixed		Config value
     */
    public function getConfig($key, $default = false)
    {
        if (is_null($key)) {
            return $this->config->all();
        }
        if (is_array($key)) {
            return $this->config->set($key);
        }
        return $this->config->get($key, $default);
    }
}
