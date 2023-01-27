<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $r1 = new Reservation();
        $r1->setConcert($this->getReference(ConcertFixtures::CONCERT_REFERENCE_1))
            ->setUser($this->getReference(UserFixtures::USER_REFERENCE_1));
        
        $manager->persist($r1);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            ConcertFixtures::class,
            UserFixtures::class
        ];
    }
}
