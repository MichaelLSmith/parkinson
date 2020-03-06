<?php

namespace Fp\Fabric;

/**
 * Initialize and setup the theme
 */
function fabric()
{
    static $theme = null;

    if (null === $theme) {
        $theme = new Theme();
        $theme->init();
    }

    return $theme->templateTags();
}
