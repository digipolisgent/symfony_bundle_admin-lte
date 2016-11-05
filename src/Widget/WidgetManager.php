<?php
namespace Avdb\AdminLteBundle\Widget;

use D01\Bundle\AdminBundle\Exception\WidgetNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;

class WidgetManager
{
    /**
     * @var array|Widget[]|ArrayCollection
     */
    private $widgets;

    /**
     * @var array
     */
    private $types;

    public function __construct()
    {
        $this->widgets = new ArrayCollection();
        $this->types = [];
    }

    /**
     * Adds a widget to the manager
     *
     * @param Widget $widget
     * @param null|integer $priority
     */
    public function add(Widget $widget, $priority = null)
    {
        if(!isset($this->types[$widget->getType()])) {
            $this->types[$widget->getType()] = [];
        }

        $this->widgets->set($widget->getAlias(), $widget);

        if($priority !== null) {
            $this->types[$widget->getType()][] = $widget;
        }else{
            $this->types[$widget->getType()][$priority] = $widget;
        }

        ksort($this->types[$widget->getType()]);
    }

    /**
     * Checks if the manager contains a widget
     *
     * @param $alias
     * @return bool
     */
    public function has($alias)
    {
        return $this->widgets->containsKey($alias);
    }

    /**
     * Fetches a widget from the manager
     *
     * @param $alias
     * @return Widget
     * @throws WidgetNotFoundException
     */
    public function get($alias) : Widget
    {
        if(false === $this->has($alias)) {
            throw WidgetNotFoundException::fromAlias($alias);
        }
        
        return $this->widgets->get($alias);
    }

    /**
     * Returns all widgets for a certain type
     *
     * @param $type
     * @return array|Widget[]
     */
    public function getForType($type)
    {
        return $this->types[$type] ?? [];
    }
}
