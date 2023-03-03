<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Concert;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ConcertFixtures extends Fixture implements DependentFixtureInterface
{

    public const CONCERT_REFERENCE_1 = 'concert1';
    public const CONCERT_REFERENCE_2 = 'concert2';
    public const CONCERT_REFERENCE_3 = 'concert3';
    public const CONCERT_REFERENCE_4 = 'concert4';
    public const CONCERT_REFERENCE_5 = 'concert5';
    public const CONCERT_REFERENCE_6 = 'concert6';
    public const CONCERT_REFERENCE_7 = 'concert7';
    public const CONCERT_REFERENCE_8 = 'concert8';
    public const CONCERT_REFERENCE_9 = 'concert9';
    public const CONCERT_REFERENCE_10 = 'concert10';

    public function load(ObjectManager $manager): void
    {
        $c1 = new Concert();
        $c1->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','24/03/2022'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(45)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_1));
        $manager->persist($c1);

        $c2 = new Concert();
        $c2->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','12/06/2022'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(23)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_4));
        $manager->persist($c2);

        $c3 = new Concert();
        $c3->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','18/10/2022'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_2))
            ->setPrix(32)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_5));
        $manager->persist($c3);

        $c4 = new Concert();
        $c4->setName('Joyeux Noel')
            ->setDate(\DateTime::createFromFormat('d/m/Y','24/12/2022'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(32)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_3));
        $manager->persist($c4);

        $c5 = new Concert();
        $c5->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','24/03/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_2))
            ->setPrix(45)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_4));
        $manager->persist($c5);

        $c6 = new Concert();
        $c6->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','21/04/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(23)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_1));
        $manager->persist($c6);

        $c7 = new Concert();
        $c7->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','12/05/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_2))
            ->setPrix(32)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_2));
        $manager->persist($c7);

        $c8 = new Concert();
        $c8->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','25/05/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(45)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_5));
        $manager->persist($c8);

        $c9 = new Concert();
        $c9->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','01/06/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(32)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_3));
        $manager->persist($c9);

        $c10 = new Concert();
        $c10->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','14/07/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_1))
            ->setPrix(23)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_4));
        $manager->persist($c10);

        $c11 = new Concert();
        $c11->setName('Holy Crusade')
            ->setDate(\DateTime::createFromFormat('d/m/Y','24/09/2023'))
            ->setStage($this->getReference(StageFixtures::STAGE_REFERENCE_2))
            ->setPrix(32)
            ->setBand($this->getReference(BandFixtures::BAND_REFERENCE_5));
        $manager->persist($c11);

        $manager->flush();

        $this->addReference(self::CONCERT_REFERENCE_1, $c1);
        $this->addReference(self::CONCERT_REFERENCE_2, $c2);
        $this->addReference(self::CONCERT_REFERENCE_3, $c3);
        $this->addReference(self::CONCERT_REFERENCE_4, $c4);
        $this->addReference(self::CONCERT_REFERENCE_5, $c5);
        $this->addReference(self::CONCERT_REFERENCE_6, $c6);
        $this->addReference(self::CONCERT_REFERENCE_7, $c7);
        $this->addReference(self::CONCERT_REFERENCE_8, $c8);
        $this->addReference(self::CONCERT_REFERENCE_9, $c9);
        $this->addReference(self::CONCERT_REFERENCE_10, $c10);
    }

    public function getDependencies() {
        return [
            StageFixtures::class,
            BandFixtures::class
        ];
    }
}
