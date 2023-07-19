<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {

    }

    public function load(ObjectManager $manager): void
    {
        $user = [
            'user_name' => 'Mohamed',
            'last_name' => 'Hassan',
            'email' => 'moham.hassen@gmail.com',
            'phone_number' => '+201621203118',
            'location' => 'Tunisie',
            'about_me' => 'Je suis php dev',
            'education' => ['Dev'],

        ];
        $userObj = $manager->getRepository(User::class)->findOneBy([
            'email' =>$user['email']
        ]);
        if(!$userObj) {
            $userObj = new User();
            $password = $this->passwordHasher->hashPassword($userObj,'mha');
            $userObj->setFirstName($user['user_name']);
            $userObj->setLastName($user['last_name']);
            $userObj->setEmail($user['email']);
            $userObj->setPhoneNumber($user['phone_number']);
            $userObj->setLocation($user['location']);
            $userObj->setAboutMe($user['about_me']);
            $userObj->setEducation($user['education']);
            $userObj->setPassword($password);
            $userObj->setActive(true);
            $manager->persist($userObj);
            $manager->flush();
        }

    }
}
