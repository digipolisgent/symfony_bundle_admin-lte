<?php

namespace Avdb\AdminLteBundle\Twig;

use Symfony\Component\Routing\RouterInterface;

class DropzoneExtension extends \Twig_Extension
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * DropzoneExtension constructor.
     *
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            'dropzone' => new \Twig_SimpleFunction(
                'dropzone', [$this, 'dropzone'],
                [
                    'needs_environment' => true,
                    'is_safe' => ['html']
                ]
            ),
        ];
    }

    /**
     * @param \Twig_Environment $twig
     * @param string $route
     * @param array $params
     * @return string
     */
    public function dropzone(\Twig_Environment $twig, $route, array $params = array())
    {
        return $twig->render('AdminLteBundle:partials:dropzone.html.twig', [
            'uri' => $this->router->generate($route, $params)
        ]);
    }
}
