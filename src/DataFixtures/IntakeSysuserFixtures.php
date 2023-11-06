<?php

namespace App\DataFixtures;

use App\Entity\Intake;
use App\Entity\IntakeSysuser;
use App\Entity\Sysuser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class IntakeSysuserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $intakeNames = ['Full Stack Developer', 'UX/UI Designer', 'Business Analyst'];

        // Create 3 IntakeSysuser entities since you now have 3 intakes
        foreach ($intakeNames as $i => $name) {
            $intakeSysuser = new IntakeSysuser();

            // Grab the Intake and Sysuser instances that were created by their respective fixtures
            $intake = $this->getReference('intake_' . str_replace(' ', '_', $name));
            $sysuser = $this->getReference('sysuser_' . ($i + 1)); // assuming you still have 5 sysusers

            $intakeSysuser->setIntake($intake);
            $intakeSysuser->setSysuser($sysuser);  // Assuming you have a setSysuser() method in your IntakeSysuser entity

            $manager->persist($intakeSysuser);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            IntakeFixtures::class,
            SysuserFixtures::class,
        ];
    }
}
