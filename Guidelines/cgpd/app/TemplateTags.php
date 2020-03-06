<?php

namespace Fp\Fabric;

use RuntimeException;

/**
 * Template Tags for use in theme templates
 *
 * Based on WP_Rig theme but customized to support Floating-Point Workflow
 *
 * @package Fp\Fabric
 */
class TemplateTags
{

    /**
     * Associative array of all available template tags.
     *
     * Method names are the keys, their callback information the values.
     *
     * @var array
     */
    protected $templateTags = [];

    /**
     * Initialize the class
     *
     * @param	array<TemplateInterface>	$components		Components that implement Fp\Fabric\TemplateInterface
     * @return	void
     */
    public function __construct(array $components = [])
    {
        foreach ($components as $component) {
            if ($component instanceof Interfaces\TemplateInterface) {
                $this->setTag($component);
            }
        }
    }

    /**
     * Call method for tags
     *
     * @param	string		$method		Name of the method
     * @param	array		$args		Method Arguments
     * @return	mixed
     */
    public function __call(string $method, array $args)
    {
        if (isset($this->templateTags[$method])) {
            return call_user_func_array($this->templateTags[$method]['callback'], $args);
        }
    }

    /**
     * Set the template tags
     *
     * @param	TemplateInterface	$component		The template component
     * @return	void
     */
    protected function setTag(Interfaces\TemplateInterface $component)
    {
        $tags = $component->templateTags();

        foreach ($tags as $method => $callback) {
            if (\is_callable($callback)) {
                if (isset($this->templateTags[$method])) {
                    throw new RuntimeException(
                        sprintf(
                            __('The template tag method %1$s registered by theme component %2$s conflicts with an already registered template tag of the same name.', 'fp-fabric'),
                            $method_name,
                            get_class($component)
                        )
                    );
                }

                $this->templateTags[$method] = [ 'callback' => $callback ];
            }
        }
    }
}
