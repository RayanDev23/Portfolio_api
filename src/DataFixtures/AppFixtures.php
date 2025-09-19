<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skills = [
            ['Symfony', 85, 'Backend, API, Security'],
            ['Angular', 80, 'SPA, RxJS, Interceptors'],
            ['PHP', 90, 'OOP, Patterns'],
            ['TypeScript', 75, 'Services, Modules, Guards'],
            ['SQL', 70, 'Doctrine, migrations'],
        ];

        foreach ($skills as [$name, $level, $desc]) {
            $skill = new Skill();
            $skill->setName($name);
            $skill->setLevel($level);
            $skill->setDescription($desc);

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
