<?php

namespace App\Twig\Runtime;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\RuntimeExtensionInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Environment;

class AppExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(private Environment $twig,private ParameterBagInterface $parameterBag)
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

    public function getWebPackPathFile($keyword): ?string
    {
        $file_name = $this->parameterBag->get("kernel.project_dir")."/public/build/manifest.json";
        if(!file_exists($file_name)) {
            return '';
        }
        $paths = json_decode(file_get_contents($file_name),true);
        return $paths[$keyword]??'';
    }
}
