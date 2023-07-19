<?php
namespace App\DataFixtures;


use App\Entity\CourseLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class CourseLevelFixture extends Fixture implements FixtureGroupInterface
{

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $levels = [
            [
                'name' => 'Advanced'
            ],
            [
                'name' => 'Beginner'
            ],
            [
                'name' => 'Intermediate'
            ]
        ];

        foreach ($levels as $level)
        {
            extract($level);
            $level_obj = $manager->getRepository(CourseLevel::class)->findOneBy(['name' => $name]);
            if(!$level_obj) {
                $level_obj = new CourseLevel();
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
        return ['courseLevel'];
    }
}