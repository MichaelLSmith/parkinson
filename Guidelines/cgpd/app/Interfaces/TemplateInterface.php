<?php

namespace Fp\Fabric\Interfaces;

/**
 * Interface for Classes that expose template tags
 */
interface TemplateInterface
{
    /**
     * Get exposed template tags
     *
     * @return	array	Associative array containing template tags
     * 					$method => $callback
     */
    public function templateTags() : array;
}
