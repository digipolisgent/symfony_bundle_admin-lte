<?php
namespace Avdb\AdminLteBundle\Twig;

use Avdb\AdminLteBundle\Widget\WidgetManager;

/**
 * Class WidgetExtension
 *
 * @package Avdb\AdminLteBundle\Twig
 */
class WidgetExtension extends \Twig_Extension
{
    /**
     * @var WidgetManager
     */
    private $manager;

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_lte_widget_extension';
    }

    /**
     * WidgetExtension constructor.
     *
     * @param WidgetManager $manager
     */
    public function __construct(WidgetManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            'widgets_render' => new \Twig_SimpleFunction(
                'widgets_render',
                [$this, 'renderWidgets'],
                ['is_safe' => ['html']]
            ),
            'widget_render'  => new \Twig_SimpleFunction(
                'widget_render',
                [$this, 'renderWidget'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    /**
     * @param $type
     * @return string
     */
    public function renderWidgets($type)
    {
        $output  = '';
        $widgets = $this->manager->getForType($type);
        foreach($widgets as $widget) {
            $output .= $widget();
        }

        return $output;
    }

    /**
     * @param $alias
     * @param array $options
     * @return string
     */
    public function renderWidget($alias, array $options = [])
    {
        $widget = $this->manager->get($alias);
        return $widget($options);
    }
}
