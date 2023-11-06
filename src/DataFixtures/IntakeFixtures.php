<?php

namespace App\DataFixtures;

use App\Entity\Intake;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IntakeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $intakeNames = ['Full Stack Developer', 'UX/UI Designer', 'Business Analyst'];

        foreach ($intakeNames as $name) {
            $intake = new Intake();
            $intake->setName($name);
            $intake->setStartDate(new \DateTime());
            $intake->setEndDate((new \DateTime())->modify('+3 month'));

            $manager->persist($intake);
            $this->addReference('intake_' . str_replace(' ', '_', $name), $intake);
        }

        $manager->flush();
    }
}
