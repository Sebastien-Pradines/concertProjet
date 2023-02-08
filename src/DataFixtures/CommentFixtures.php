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
        $c1->setContent("j'aime pas !")
            ->setUser($this->getReference(UserFixtures::USER_REFERENCE_1))
            ->setConcert($this->getReference(ConcertFixtures::CONCERT_REFERENCE_1));

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
