<?php

namespace App\Twig\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsLiveComponent()]
final class StatsCourse
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $message;

    #[LiveProp(writable: true)]
    public string $icon;

    #[LiveProp(writable: true)]
    public string $val;

    #[LiveProp(writable: true)]
    public string $unit;

    #[LiveProp(writable: true)]
    public string $stats;

    #[PreMount]
    public function preMount(array $data): array
    {
        $unit = '';
        if($data['val'] > 1000) {
            $data['val'] = floor($data['val'] / 1000);
            $unit = 'K';
        }
        $data['unit'] = $unit.$data['unit'];
        return $data;
    }
}
