<?php

namespace Fp\Fabric\Interfaces;

/**
 * Interface for Classes that expose template tags
 */
interface RenderableInterface
{
    /**
     * Echo out HTML String
     *
	 * @return void
     */
    public static function render();
}
