<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Member;

class MemberFixtures extends Fixture
{

    public const MEMBER_REFERENCE_1 = 'member1';
    public const MEMBER_REFERENCE_2 = 'member2';
    public const MEMBER_REFERENCE_3 = 'member3';
    public const MEMBER_REFERENCE_4 = 'member4';
    public const MEMBER_REFERENCE_5 = 'member5';
    public const MEMBER_REFERENCE_6 = 'member6';
    public const MEMBER_REFERENCE_7 = 'member7';
    public const MEMBER_REFERENCE_8 = 'member8';
    public const MEMBER_REFERENCE_9 = 'member9';
    public const MEMBER_REFERENCE_10 = 'member10';
    public const MEMBER_REFERENCE_11 = 'member11';
    public const MEMBER_REFERENCE_12 = 'member12';
    public const MEMBER_REFERENCE_13 = 'member13';
    public const MEMBER_REFERENCE_14 = 'member14';
    public const MEMBER_REFERENCE_15 = 'member15';
    public const MEMBER_REFERENCE_16 = 'member16';
    public const MEMBER_REFERENCE_17 = 'member17';

    public function load(ObjectManager $manager): void
    {
        $m1 = new Member();
        $m1->setFirstName('Robert')
            ->setLastName('Trujillo')
            ->setGroupRole('Bassiste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','24/12/0'))
            ->setPicture('Robert_Trujillo_2017.jpg');
        $manager->persist($m1);

        $m2 = new Member();
        $m2->setFirstName('James')
            ->setLastName('Hetfield')
            ->setGroupRole('Chanteur / Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','13/08/1963'))
            ->setPicture('James_Hetfield_2017.jpg');
        $manager->persist($m2);

        $m3 = new Member();
        $m3->setFirstName('Lars')
            ->setLastName('Ulrich')
            ->setGroupRole('Batteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','26/13/1963'))
            ->setPicture('Lars_Ulrich_(26060414430).jpg');
        $manager->persist($m3);

        $m4 = new Member();
        $m4->setFirstName('Kirk')
            ->setLastName('Hammett')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','18/11/1962'))
            ->setPicture('Kirk_Hammett_2017.jpg');
        $manager->persist($m4);

        $m5 = new Member();
        $m5->setFirstName('Serj')
            ->setLastName('Tankian')
            ->setGroupRole('Chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','21/07/1967'))
            ->setPicture('330px-Serj).jpg');
        $manager->persist($m5);

        $m6 = new Member();
        $m6->setFirstName('Daron')
            ->setLastName('Malakian')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','18/06/1975'))
            ->setPicture('DM-photo.jpg');
        $manager->persist($m6);

        $m7 = new Member();
        $m7->setFirstName('Shavo')
            ->setLastName('Odadjian')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','22/04/1974'))
            ->setPicture('330px-ShavoBass.jpg');
        $manager->persist($m7);

        $m8 = new Member();
        $m8->setFirstName('John')
            ->setLastName('Dolmayan')
            ->setGroupRole('Batteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','15/06/1973'))
            ->setPicture('330px-.jpg');
        $manager->persist($m8);

        $m9 = new Member();
        $m9->setFirstName('Dave')
            ->setLastName('Mustaine')
            ->setGroupRole('Chanteur / Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','13/09/1961'))
            ->setPicture('330px-).jpg');
        $manager->persist($m9);

        $m10 = new Member();
        $m10->setFirstName('Kiko')
            ->setLastName('Loureiro')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','16/06/1972'))
            ->setPicture('W1869-Hellfest2014.jpg');
        $manager->persist($m10);

        $m11 = new Member();
        $m11->setFirstName('Dirk')
            ->setLastName('Verbeuren')
            ->setGroupRole('Batteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','8/01/1975'))
            ->setPicture('330px-Dirk_Verbeuren.jpg');
        $manager->persist($m11);

        $m12 = new Member();
        $m12->setFirstName('James')
            ->setLastName('LoMenzo')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','13/01/1959'))
            ->setPicture('330px-Metalma.jpg');
        $manager->persist($m12);

        $m13 = new Member();
        $m13->setFirstName('Ozzy')
            ->setLastName('Osbourne')
            ->setGroupRole('Chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','03/12/1948'))
            ->setPicture('330px-Metalma.jpg');
        $manager->persist($m13);

        $m14 = new Member();
        $m14->setFirstName('Tony')
            ->setLastName('Iommi')
            ->setGroupRole('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','19/02/1948'))
            ->setPicture('330px-Metalma.jpg');
        $manager->persist($m14);

        $m15 = new Member();
        $m15->setFirstName('Geezer')
            ->setLastName('Butler')
            ->setGroupRole('Bassiste')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','17/07/1949'))
            ->setPicture('330px-Metalma.jpg');
        $manager->persist($m15);

        $m16 = new Member();
        $m16->setFirstName('Tommy')
            ->setLastName('Clufetos')
            ->setGroupRole('Batteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','30/12/1979'))
            ->setPicture('330px-Metalma.jpg');
        $manager->persist($m16);

        $m17 = new Member();
        $m17->setFirstName('Jesus')
            ->setLastName('de Nazareth')
            ->setGroupRole('Chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','24/12/0000'))
            ->setPicture('amen.jpg');
        $manager->persist($m17);


        $manager->flush();

        $this->addReference(self::MEMBER_REFERENCE_1, $m1);
        $this->addReference(self::MEMBER_REFERENCE_2, $m2);
        $this->addReference(self::MEMBER_REFERENCE_3, $m3);
        $this->addReference(self::MEMBER_REFERENCE_4, $m4);
        $this->addReference(self::MEMBER_REFERENCE_5, $m5);
        $this->addReference(self::MEMBER_REFERENCE_6, $m6);
        $this->addReference(self::MEMBER_REFERENCE_7, $m7);
        $this->addReference(self::MEMBER_REFERENCE_8, $m8);
        $this->addReference(self::MEMBER_REFERENCE_9, $m9);
        $this->addReference(self::MEMBER_REFERENCE_10, $m10);
        $this->addReference(self::MEMBER_REFERENCE_11, $m11);
        $this->addReference(self::MEMBER_REFERENCE_12, $m12);
        $this->addReference(self::MEMBER_REFERENCE_13, $m13);
        $this->addReference(self::MEMBER_REFERENCE_14, $m14);
        $this->addReference(self::MEMBER_REFERENCE_15, $m15);
        $this->addReference(self::MEMBER_REFERENCE_16, $m16);
        $this->addReference(self::MEMBER_REFERENCE_17, $m17);
    }
}
