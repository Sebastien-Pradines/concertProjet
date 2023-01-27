<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Concert;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ConcertFixtures extends Fixture implements DependentFixtureInterface
{

    public const CONCERT_REFERENCE_1 = 'concert1';

    public function load(ObjectManager $manager): void
    {
        $c1 = new Concert();
        $c1->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','24/03/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(66.6)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_1));
        
        $manager->persist($c1);

        $manager->flush();

        $this->addReference(self::CONCERT_REFERENCE_1, $c1);
    }

    public function getDependencies() {
        return [
            StageFixtures::class,
            BandFixtures::class
        ];
    }
}
