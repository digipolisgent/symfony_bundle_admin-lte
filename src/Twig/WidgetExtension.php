<?php
namespace Avdb\AdminLteBundle\Twig;

use Avdb\AdminLteBundle\Component\Templating\TemplateReference;
use Avdb\AdminLteBundle\Widget\Widget;
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
                ['is_safe' => ['html'], 'needs_environment' => true]
            ),
            'widget_render'  => new \Twig_SimpleFunction(
                'widget_render',
                [$this, 'renderWidget'],
                ['is_safe' => ['html'], 'needs_environment' => true]
            ),
        ];
    }

    /**
     * @param \Twig_Environment $twig
     * @param $type
     * @return string
     */
    public function renderWidgets(\Twig_Environment $twig, $type)
    {
        $output  = '';
        $widgets = $this->manager->getForType($type);

        foreach($widgets as $widget) {
            $output .= $this->render($twig, $widget, []);
        }

        return $output;
    }

    /**
     * @param \Twig_Environment $twig
     * @param $alias
     * @param array $options
     *
     * @return string
     * @throws \Avdb\AdminLteBundle\Exception\WidgetNotFoundException
     */
    public function renderWidget(\Twig_Environment $twig, $alias, array $options = [])
    {
        return $this->render($twig, $this->manager->get($alias), $options);
    }

    /**
     * @param \Twig_Environment $twig
     * @param Widget $widget
     * @param $options
     * @return string
     */
    private function render(\Twig_Environment $twig, Widget $widget, $options)
    {
        $response = $widget($options);

        if ($response instanceof TemplateReference) {
            return (string)$twig->render($response->getTemplate(), $response->getVariables());
        }

        return (string)$response;
    }
}
