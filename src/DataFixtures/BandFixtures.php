<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Band;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BandFixtures extends Fixture implements DependentFixtureInterface
{
    public const BAND_REFERENCE_1 = 'band1';
    public const BAND_REFERENCE_2 = 'band2';
    public const BAND_REFERENCE_3 = 'band3';

    public function load(ObjectManager $manager): void
    {
        $b1 = new Band();
        $b1->setName('HolySheet')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_1))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_2));
        $manager->persist($b1);

        $b2 = new Band();
        $b2->setName('MicroHealth')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_3));
        $manager->persist($b2);

        $b3 = new Band();
        $b3->setName('groupe cool')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_4));
        $manager->persist($b3);

        $manager->flush();

        $this->addReference(self::BAND_REFERENCE_1, $b1);
        $this->addReference(self::BAND_REFERENCE_2, $b2);
        $this->addReference(self::BAND_REFERENCE_3, $b3);
    }

    public function getDependencies() {
        return [
            MemberFixtures::class
        ];
    }
}
