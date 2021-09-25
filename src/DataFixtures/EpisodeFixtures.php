<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Service\Slugify;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<5; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season '.$i));
            $episode->setTitle('episode '.$i);
            $slug = $this->slugify->generate($episode->getTitle());
            $episode->setSlug($slug);
            $manager->persist($episode);
            $this->addReference('episode '.$i, $episode);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
