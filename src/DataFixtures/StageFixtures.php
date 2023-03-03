<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stage;

class StageFixtures extends Fixture
{

    public const STAGE_REFERENCE_1 = 'stage1';
    public const STAGE_REFERENCE_2 = 'stage2';

    public function load(ObjectManager $manager): void
    {
        $s1 = new Stage();
        $s1->setName('Salle 1');
        $manager->persist($s1);

        $s2 = new Stage();
        $s2->setName('Salle 2');
        $manager->persist($s2);

        $manager->flush();

        $this->addReference(self::STAGE_REFERENCE_1, $s1);
        $this->addReference(self::STAGE_REFERENCE_2, $s2);
    }
}
