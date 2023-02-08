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

    public function load(ObjectManager $manager): void
    {
        $m1 = new Member();
        $m1->setFirstName('Jesus')
            ->setLastName('de Nazareth')
            ->setGroupRole('chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','24/12/0'))
            ->setPicture('amen.jpg');
        $manager->persist($m1);

        $m2 = new Member();
        $m2->setFirstName('Sebastien')
            ->setLastName('Pradines')
            ->setGroupRole('clavier')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','12/10/1998'))
            ->setPicture('moi.jpg');
        $manager->persist($m2);

        $m3 = new Member();
        $m3->setFirstName('Jean')
            ->setLastName('Michel')
            ->setGroupRole('chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','12/03/1974'))
            ->setPicture('amen.jpg');
        $manager->persist($m3);

        $m4 = new Member();
        $m4->setFirstName('Mob')
            ->setLastName('Barley')
            ->setGroupRole('chanteur')
            ->setBirthDate(\DateTime::createFromFormat('d/m/Y','13/02/1967'))
            ->setPicture('bom.jpg');
        $manager->persist($m4);


        $manager->flush();

        $this->addReference(self::MEMBER_REFERENCE_1, $m1);
        $this->addReference(self::MEMBER_REFERENCE_2, $m2);
        $this->addReference(self::MEMBER_REFERENCE_3, $m3);
        $this->addReference(self::MEMBER_REFERENCE_4, $m4);
    }
}
