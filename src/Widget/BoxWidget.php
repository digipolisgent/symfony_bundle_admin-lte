<?php
namespace Avdb\AdminLteBundle\Widget;

use Avdb\AdminLteBundle\Component\Templating\TemplateReference;
use Avdb\AdminLteBundle\Domain\Color;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BoxWidget
 *
 * @package Avdb\AdminLteBundle\Widget
 */
class BoxWidget implements Widget
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $type;
    
    /**
     * BoxWidget constructor.
     *
     * @param array $options
     * @param $alias
     * @param $type
     */
    public function __construct(array $options, $alias, $type = Widget::TYPE_CONTENT_TOP)
    {
        $resolver = new OptionsResolver();
        $resolver->setDefault('width', 3);
        $resolver->setDefault('color', Color::AQUA);
        $resolver->setDefault('link_label', 'More info');
        $resolver->setDefault('link_uri', '#');

        $resolver->setRequired(['title', 'text', 'icon']);

        $this->options = $resolver->resolve($options);
        $this->alias = $alias;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns a template reference to be rendered by the extension
     *
     * @param array $options
     * @return TemplateReference
     */
    public function __invoke(array $options = [])
    {
        return new TemplateReference('AdminLteBundle:widget:box.html.twig', array_merge($this->options, $options));
    }
}
