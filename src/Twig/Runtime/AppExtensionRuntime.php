<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Environment;

class AppExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(private Environment $twig)
    {

    }

    public function returnTwigContent($value,$params)
    {
        $template = $this->twig->createTemplate($value);
        return $template->render($params);
    }

    public function doSomething($value)
    {

    }
}
