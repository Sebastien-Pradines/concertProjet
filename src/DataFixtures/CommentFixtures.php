<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Comment();
        $c1->setContent("J'aime pas !")
            ->setUser($this->getReference(UserFixtures::USER_REFERENCE_2))
            ->setConcert($this->getReference(ConcertFixtures::CONCERT_REFERENCE_1));
        $manager->persist($c1);

        $c1 = new Comment();
        $c1->setContent("C'était un super concert !")
            ->setUser($this->getReference(UserFixtures::USER_REFERENCE_3))
            ->setConcert($this->getReference(ConcertFixtures::CONCERT_REFERENCE_1));
        $manager->persist($c1);

        $c1 = new Comment();
        $c1->setContent("Un bon concert mais l'état des toilettes était à revoir...")
            ->setUser($this->getReference(UserFixtures::USER_REFERENCE_4))
            ->setConcert($this->getReference(ConcertFixtures::CONCERT_REFERENCE_2));
        $manager->persist($c1);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            ConcertFixtures::class,
            UserFixtures::class
        ];
    }
}
