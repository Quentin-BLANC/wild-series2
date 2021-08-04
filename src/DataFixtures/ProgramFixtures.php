<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<5; $i++) {
            $program = new Program();
            $program->setTitle('Title '.$i);
            $program->setSummary('Summary '.$i);
            $program->setCategory($this->getReference('category '.$i));
            $program->addActor($this->getReference('actor '.$i));
            $program->setSlug('Slug '.$i);
            $manager->persist($program);
            $this->addReference('program '.$i, $program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
