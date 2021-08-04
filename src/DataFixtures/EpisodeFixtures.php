<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<5; $i++) {
            $episode = new Episode();
            $episode->setTitle('episode '.$i);
            $manager->persist($episode);
        }

        $manager->flush();
    }
}
