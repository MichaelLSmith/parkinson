<?php

    if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
        require get_template_directory() . '/vendor/autoload.php';
    } else {
        function _fp_fabric_autoload($class_name)
        {
            $namespace = 'Fp\Fabric';

            if (strpos($class_name, $namespace . '\\') !== 0) {
                return false;
            }

            $parts = explode('\\', substr($class_name, strlen($namespace . '\\')));
            $path = get_template_directory() . '/src';
            foreach ($parts as $part) {
                $path .= '/' . $part;
            }
            $path .= '.php';
            if (! file_exists($path)) {
                return false;
            }
            require_once $path;
            return true;
        }
        spl_autoload_register('_wp_rig_autoload');
    }

    require get_template_directory() . '/app/functions.php';

    call_user_func('Fp\Fabric\fabric');
