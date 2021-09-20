<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 5; $i++) { 
        $comment = new Comment();
        $comment->setComment('commentaire'.$i);
        $comment->setRate($i);
        $comment->setAuthor($this->getReference('contributor@monsite.com'));
        $comment->setEpisode($this->getReference('episode'.$i));
        $manager->persist($comment);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            EpisodeFixtures::class,
        ];
    }
}
