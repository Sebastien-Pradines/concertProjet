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
    public const BAND_REFERENCE_4 = 'band4';
    public const BAND_REFERENCE_5 = 'band5';

    public function load(ObjectManager $manager): void
    {
        $b1 = new Band();
        $b1->setName('HolySheet')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_17));
        $manager->persist($b1);

        $b2 = new Band();
        $b2->setName('Black Sabbath')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_13))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_14))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_15))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_16));
        $manager->persist($b2);

        $b3 = new Band();
        $b3->setName('Metallica')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_1))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_2))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_3))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_4));
        $manager->persist($b3);

        $b4 = new Band();
        $b4->setName('System of a Dawn')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_5))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_6))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_7))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_8));
        $manager->persist($b4);

        $b5 = new Band();
        $b5->setName('Megadeth')
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_9))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_10))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_11))
            ->addMember($this->getReference(MemberFixtures::MEMBER_REFERENCE_12));
        $manager->persist($b5);

        $manager->flush();

        $this->addReference(self::BAND_REFERENCE_1, $b1);
        $this->addReference(self::BAND_REFERENCE_2, $b2);
        $this->addReference(self::BAND_REFERENCE_3, $b3);
        $this->addReference(self::BAND_REFERENCE_4, $b4);
        $this->addReference(self::BAND_REFERENCE_5, $b5);
    }

    public function getDependencies() {
        return [
            MemberFixtures::class
        ];
    }
}
