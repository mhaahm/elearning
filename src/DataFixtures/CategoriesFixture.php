<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $categsP = [
          [
              'name' => 'Development'
          ], [
              'name' => 'Design'
          ], [
              'name' => 'Marketing'
          ], [
              'name' => 'Music'
          ], [
              'name' => 'Lifestyle'
          ], [
              'name' => 'IT & Software'
          ], [
              'name' => 'Personal Development'
          ], [
              'name' => 'Health and fitness'
          ], [
              'name' => 'Teaching'
          ], [
              'name' => 'Social science'
          ], [
              'name' => 'Math and Logic'
          ]];
          $categL1 = [
            [
              'name' => 'Web Development',
               'parent' => 'Development'
          ], [
              'name' => 'Data science',
               'parent' => 'Development'
          ], [
              'name' => 'Mobile Development',
               'parent' => 'Development'
          ], [
              'name' => 'Programing Language',
               'parent' => 'Development'
          ], [
              'name' => 'Software Testing',
               'parent' => 'Development'
          ], [
              'name' => 'Software Engineering',
               'parent' => 'Development'
          ], [
              'name' => 'Software Development Tools',
               'parent' => 'Development'
          ]];

          $categL2= [
              [
                  'name' => 'CSS',
                  'parent' => 'Web Development'
              ],
              [
              'name' => 'Javascript',
               'parent' => 'Web Development'
          ], [
              'name' => 'PHP',
               'parent' => 'Web Development'
          ], [
              'name' => 'Angular',
               'parent' => 'Web Development'
          ], [
              'name' => 'HTML',
               'parent' => 'Web Development'
          ], [
              'name' => 'Reactjs',
               'parent' => 'Web Development'
          ], [
              'name' => 'Market Research',
               'parent' => 'Marketing'
          ], [
              'name' => 'Advertising',
               'parent' => 'Marketing'
          ], [
              'name' => 'Consumer bihavior',
               'parent' => 'Marketing'
          ], [
              'name' => 'Digital Merketing',
               'parent' => 'Marketing'
          ], [
              'name' => 'Social Media Merketing',
               'parent' => 'Marketing'
          ], [
              'name' => 'Decision Science',
               'parent' => 'Marketing'
          ], [
              'name' => 'Marketing Ethics',
               'parent' => 'Marketing'
          ], [
              'name' => 'Public Relation',
               'parent' => 'Marketing'
          ], [
              'name' => 'Advertising',
               'parent' => 'Marketing'
          ], [
              'name' => 'SEO',
               'parent' => 'Marketing'
          ], [
              'name' => 'Business Marketing',
              'parent' => 'Marketing'
          ]
        ];
        $categs = [];
        foreach ($categsP as $c)
        {
            $name = $c['name'];
            $obj = $manager->getRepository(Category::class)->findOneBy([
                'name' => $name
            ]);
            if(!$obj) {
                $obj = new Category();
                $obj->setName($name);
            }
            $categs[$name] = $obj;
            $manager->persist($obj);
        }
        $manager->flush();
        foreach ($categL1 as $c)
        {
            $name = $c['name'];
            $obj = $manager->getRepository(Category::class)->findOneBy([
                'name' => $name
            ]);
            if(!$obj) {
                $obj = new Category();
                $obj->setName($name);
            }

            if(isset($c['parent'])) {
                $objP = $manager->getRepository(Category::class)->findOneBy([
                    'name' => $c['parent']
                ]);
                $manager->persist($objP);
                $obj->setParent($objP);
            }
            $manager->persist($obj);
        }
        $manager->flush();
        foreach ($categL2 as $c)
        {
            $name = $c['name'];
            $obj = $manager->getRepository(Category::class)->findOneBy([
                'name' => $name
            ]);
            if(!$obj) {
                $obj = new Category();
                $obj->setName($name);
            }

            if(isset($c['parent'])) {
                $objP = $manager->getRepository(Category::class)->findOneBy([
                    'name' => $c['parent']
                ]);
                $manager->persist($objP);
                $obj->setParent($objP);
            }
            $manager->persist($obj);
        }
        $manager->flush();
    }
}
