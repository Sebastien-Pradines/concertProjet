<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TagFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $t1 = new Tags();
        $t1->setName("rock")
            ->addBand($this->getReference(BandFixtures::BAND_REFERENCE_3));

        $manager->persist($t1);

        $t2 = new Tags();
        $t2->setName("metal")
            ->addBand($this->getReference(BandFixtures::BAND_REFERENCE_2));

        $manager->persist($t2);

        $t3 = new Tags();
        $t3->setName("heavy metal")
            ->addBand($this->getReference(BandFixtures::BAND_REFERENCE_1));

        $manager->persist($t3);
            

        $manager->flush();
    }

    public function getDependencies() {
        return [
            BandFixtures::class
        ];
    }
}
