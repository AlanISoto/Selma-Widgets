<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Intake;
use App\Entity\Sysuser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Define the intake names that are now available
        $intakeNames = ['Full Stack Developer', 'UX/UI Designer', 'Business Analyst'];

        for ($i = 1; $i <= 10; $i++) {
            $event = new Event();
            $event->setName('Event' . $i);

            // Set random start and end times for the events
            $startDate = new \DateTime(sprintf('-%d days', rand(1, 30)));
            $endDate = clone $startDate;
            $endDate->modify(sprintf('+%d hours', rand(1, 5)));

            $event->setStartTime($startDate);
            $event->setEndTime($endDate);

            // Fetch a random intake name from the $intakeNames array and get its reference
            $randomIntakeName = $intakeNames[array_rand($intakeNames)];
            $intake = $this->getReference('intake_' . str_replace(' ', '_', $randomIntakeName));

            $sysuser = $this->getReference('sysuser_' . rand(1, 5));

            $event->setIntake($intake);
            $event->setSysuser($sysuser);

            $event->setEventColor(sprintf('#%06X', mt_rand(0, 0xFFFFFF)));

            $manager->persist($event);
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
