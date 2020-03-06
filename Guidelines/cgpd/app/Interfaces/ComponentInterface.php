<?php

namespace Fp\Fabric\Interfaces;

/**
 * Interface for Initializable classes
 */
interface ComponentInterface
{
    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function getSlug() : string;

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function init();
}
