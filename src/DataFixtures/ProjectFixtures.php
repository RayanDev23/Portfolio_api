<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projects = [
            [
                'Portfolio api Symfony', 
                'Mon portfolio web complet avec Symfony backend', 
                'portfolio.png', 
                'https://github.com/RayanDev23/Portfolio_api'
            ],
            [
                'Portfiolio front Angular', 
                'Mon portfolio web complet avec Angular frontend', 
                'blog.png', 
                'https://github.com/RayanDev23/Portfolio_frontAngular'
            ],
            [
                'Projet php en vanilla', 
                'Site de commerce en vanilla php', 
                'todo.png', 
                'https://github.com/RayanDev23/projet_php_ld'
            ],
            [
                'Scrapper en python', 
                'Outil de scrapping en python', 
                'todo.png', 
                'https://github.com/RayanDev23/JVD_Scrapper/tree/master'
            ],
            [
                'Game-ranking-sf', 
                'Site ranking de jeu en symfony', 
                'todo.png', 
                'https://github.com/RayanDev23/game-ranking-sf/tree/main'
            ],
        ];

        foreach ($projects as [$title, $desc, $img, $link]) {
            $project = new Project();
            $project->setTitle($title)
                    ->setDescription($desc)
                    ->setImage($img)
                    ->setLink($link);
            $manager->persist($project);
        }

        $manager->flush();
    }
}
