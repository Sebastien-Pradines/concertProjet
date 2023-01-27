<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{

    public const USER_REFERENCE_1 = 'user1';

    public function load(ObjectManager $manager): void
    {
        $u1 = new User();
        $u1->setName('xxD4RK_S4SUK3xx')
            ->setPassword('1234')
            ->setMail('toto@gmail.com')
            ->setRole('utilisateur')
            ->addFavorite($this->getReference(BandFixtures::BAND_REFERENCE_1)) 
            ->addFavorite($this->getReference(BandFixtures::BAND_REFERENCE_2)); 
        
        $manager->persist($u1);

        $manager->flush();

        $this->addReference(self::USER_REFERENCE_1, $u1);
    }

    public function getDependencies() {
        return [
            BandFixtures::class
        ];
    }
}
