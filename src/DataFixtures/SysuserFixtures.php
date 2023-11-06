<?php

namespace App\DataFixtures;

use App\Entity\Sysuser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SysuserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $sysuser = new Sysuser();
            $sysuser->setUsername('User' . $i);
            $sysuser->setPassword('Password' . $i);
            $sysuser->setRole('Role' . $i);

            $manager->persist($sysuser);
            $this->addReference('sysuser_' . $i, $sysuser);
        }
        $manager->flush();
    }
}
