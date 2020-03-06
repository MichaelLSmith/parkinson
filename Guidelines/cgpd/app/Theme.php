<?php

namespace Fp\Fabric;

/**
 * Main Theme Class
 *
 * Based on WP_Rig theme but customized to support Floating-Point Workflow
 *
 * @package Fp\Fabric
 */
class Theme
{
    /**
     * Associative array of theme components, keyed by their slug.
     *
     * @access	protected
     * @var array
     */
    protected $components = [];

    /**
     * The template tags instance, providing access to all available template tags.
     *
     * @access protected
     * @var TemplateTags
     */
    protected $templateTags;

    /**
     * Initialize Class and Template Tags
     */
    public function __construct()
    {
        $components = $this->getDefaultComponents();
        foreach ($components as $component) {
            if ($component instanceof Interfaces\ComponentInterface) {
                $this->components[$component->getSlug()] = $component;
            }
        }

        $templateTags = $this->getDefaultTemplateTags();
        $this->templateTags = new TemplateTags($templateTags);
    }

    /**
     * Initialize the Theme
     */
    public function init()
    {
        array_walk(
            $this->components,
            function (Interfaces\ComponentInterface $component) {
                $component->init();
            }
        );
    }

    /**
     * Get the class Template Tags
     *
     * @return	array<TemplateTags>
     */
    public function templateTags() : TemplateTags
    {
        return $this->templateTags;
    }

    /**
     * Get the default Components
     *
     * @return array<ComponentInterface>
     */
    private function getDefaultComponents() : array
    {
        return [
            new Components\Assets(),
            new Components\Breadcrumbs(),
            new Components\Comments(),
            new Components\Config(),
            new Components\Dashboard(),
            new Components\Editor(),
            new Components\Images(),
            new Components\Menus(),
            new Components\Pagination(),
            new Components\Permissions(),
            new Components\Scripts(),
            new Components\Search(),
            new Components\Security(),
            new Components\Shortcodes(),
            new Components\Support(),
            new Components\Template()
        ];
    }

    /**
     * Get the Template Tags from components
     *
     * @return	array<TemplateInterface>
     */
    private function getDefaultTemplateTags()
    {
        return array_filter(
            $this->components,
            function (Interfaces\ComponentInterface $component) {
                return $component instanceof Interfaces\TemplateInterface;
            }
        );
    }
}
