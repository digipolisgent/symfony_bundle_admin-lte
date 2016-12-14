<?php
namespace Avdb\AdminLteBundle\Component\Templating;

/**
 * Class TemplateReference
 *
 * @package Avdb\AdminLteBundle\Component\Templating
 */
class TemplateReference
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var array
     */
    private $variables;

    /**
     * TemplateResponse constructor.
     *
     * @param string $template
     * @param array $variables
     */
    public function __construct($template, array $variables)
    {
        $this->template = $template;
        $this->variables = $variables;
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
