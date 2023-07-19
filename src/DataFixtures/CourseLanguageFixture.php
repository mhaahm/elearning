<?php
namespace App\DataFixtures;


use App\Entity\CourseLanguage;
use App\Entity\CourseLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class CourseLanguageFixture extends Fixture implements FixtureGroupInterface
{

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $language = [
            [
                'name' => 'French'
            ],
            [
                'name' => 'English'
            ],
            [
                'name' => 'German'
            ],
            [
                'name' => 'Arabic'
            ]
        ];

        foreach ($language as $ln)
        {
            extract($ln);
            $level_obj = $manager->getRepository(CourseLanguage::class)->findOneBy(['name' => $name]);
            if(!$level_obj) {
                $level_obj = new CourseLanguage();
                $level_obj->setName($name);
                $manager->persist($level_obj);
                $manager->flush();
            }
        }
    }

    /**
     * @return string[]
     */
    public static function getGroups(): array
    {
        return ['courseLanguage'];
    }
}