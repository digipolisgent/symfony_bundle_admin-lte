<?php

namespace DigipolisGent\AdminLteBundle\Widget;

/**
 * Interface Widget
 *
 * @package DigipolisGent\AdminLteBundle\Widget
 */
interface Widget
{
    const TYPE_HEADER           = 'HEADER_WIDGET';
    const TYPE_SIDEBAR_RIGHT    = 'SIDEBAR_WIDGET_RIGHT';
    const TYPE_SIDEBAR_LEFT     = 'SIDEBAR_WIDGET_LEFT';
    const TYPE_CONTENT_TOP      = 'CONTENT_WIDGET_TOP';


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
