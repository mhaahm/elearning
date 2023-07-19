<?php

namespace App\DataFixtures;

use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class SettingsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $params = [
            [
                'param_name' => 'home_text_title',
                'param_value' => 'Unlimited learning'
            ],
            [
                'param_name' => 'home_page_text',
                'param_value' => 'Online learning and teaching marketplace.<br> Taught by experts to help you acquire new skills.'
            ]
        ];

        foreach ($params as $param) {
           $n = $param['param_name'];
           $v = $param['param_value'];
           $p_o = $manager->getRepository(Setting::class)->findOneBy([
               'param_name' => $n
           ]);
           if(!$p_o) {
               $p_o = new Setting();
               $p_o->setParamName($n);
               $p_o->setParamValue($v);
           }
           $manager->persist($p_o);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['settings'];
    }
}
