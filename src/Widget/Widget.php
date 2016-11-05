<?php

namespace Avdb\AdminLteBundle\Widget;

/**
 * Interface Widget
 *
 * @package Avdb\AdminLteBundle\Widget
 */
interface Widget
{
    /**
     * Should return the HTML that the widget is outputting
     *
     * @param array $options
     * @return string
     */
    public function __invoke(array $options = []);

    /**
     * Returns the alias that the widget uses
     *
     * @return string
     */
    public function getAlias();

    /**
     * Returns the widget type, this can be whatever you like
     * Widgets are sorted by type in the manager,
     * you can query all widgets by a certain type
     *
     * @return string
     */
    public function getType();
}
