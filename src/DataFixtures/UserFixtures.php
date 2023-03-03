<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{

    public const USER_REFERENCE_1 = 'user1';
    public const USER_REFERENCE_2 = 'user2';
    public const USER_REFERENCE_3 = 'user3';
    public const USER_REFERENCE_4 = 'user4';

    public function load(ObjectManager $manager): void
    {
        $u1 = new User();
        $u1->setFirstName('Sébastien')
            ->setLastName('Pradines')
            ->setPassword('$2y$13$EPHCyq8RmD3HAe0OelRjruw2.p.V4en3oxbyUDHSTrRDN9xBAUYK.')
            ->setEmail('seba@gmail.com')
            ->setRoles(["ROLE_ADMIN"]);
        $manager->persist($u1);

        $u2 = new User();
        $u2->setFirstName('Joseph')
            ->setLastName('DeGrasse')
            ->setPassword('$2y$13$EPHCyq8RmD3HAe0OelRjruw2.p.V4en3oxbyUDHSTrRDN9xBAUYK.')
            ->setEmail('JosephDeGrasse@dayrep.com')
            ->setRoles(["ROLE_USER"]);
        $manager->persist($u2);

        $u3 = new User();
        $u3->setFirstName('Laetitia')
            ->setLastName('Francoeur')
            ->setPassword('$2y$13$EPHCyq8RmD3HAe0OelRjruw2.p.V4en3oxbyUDHSTrRDN9xBAUYK.')
            ->setEmail('LaetitiaFrancoeur@teleworm.us')
            ->setRoles(["ROLE_USER"]);
        $manager->persist($u3);

        $u4 = new User();
        $u4->setFirstName('Rémy')
            ->setLastName('Echeverri')
            ->setPassword('$2y$13$EPHCyq8RmD3HAe0OelRjruw2.p.V4en3oxbyUDHSTrRDN9xBAUYK.')
            ->setEmail('RemyEcheverri@teleworm.us')
            ->setRoles(["ROLE_USER"]);
        $manager->persist($u4);

        $manager->flush();

        $this->addReference(self::USER_REFERENCE_1, $u1);
        $this->addReference(self::USER_REFERENCE_2, $u2);
        $this->addReference(self::USER_REFERENCE_3, $u3);
        $this->addReference(self::USER_REFERENCE_4, $u4);
    }

    public function getDependencies() {
        return [
            BandFixtures::class
        ];
    }
}
