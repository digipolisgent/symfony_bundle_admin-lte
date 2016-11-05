<?php

namespace Avdb\AdminLteBundle\Exception;

class WidgetNotFoundException extends WidgetException
{
    /**
     * returns an exception with a default message
     *
     * @param $alias
     * @return WidgetNotFoundException
     */
    public static function fromAlias($alias)
    {
        return new self(sprintf('Widget with alias %s was not found', $alias));
    }
}
