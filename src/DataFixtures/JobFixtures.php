<?php

namespace App\DataFixtures;

use App\Job\JobFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    /**
     * @var JobFactory
     */
    private $factory;

    public function __construct(JobFactory $factory)
    {
        $this->factory = $factory;
    }

    public function load(ObjectManager $manager)
    {
        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur Symfony',
            'idAdvertisement' => 'SB86542',
            'contract' => 'cdi',
            'location' => 'Marseille',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => true,
            'publishedAt' => new \DateTime('2019-03-18'),
            ]));

        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur Php',
            'idAdvertisement' => 'SB45987',
            'contract' => 'cdd',
            'location' => 'Aix-En-Provence',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => true,
            'publishedAt' => new \DateTime('2019-03-01'),
        ]));

        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur Front-End',
            'idAdvertisement' => 'SB25987',
            'contract' => 'cdi',
            'location' => 'Aix-En-Provence',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => false,
            'publishedAt' => new \DateTime('2019-03-17'),
        ]));

        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur PHP / Symfony 3 H/F',
            'idAdvertisement' => 'SB23498',
            'contract' => 'cdi',
            'location' => 'Montpellier',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => true,
            'publishedAt' => new \DateTime('2019-03-11'),
        ]));

        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur Javascript Fullstack H/F',
            'idAdvertisement' => 'SB99854',
            'contract' => 'cdi',
            'location' => 'Montpellier',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => true,
            'publishedAt' => new \DateTime('2019-03-24'),
        ]));

        $manager->persist($this->factory->createFromArray([
            'title' => 'Développeur Html/Css',
            'idAdvertisement' => 'SB65654',
            'contract' => 'stage',
            'location' => 'Aix-En-Provence',
            'description' => file_get_contents(__DIR__.'/description.md'),
            'profile' => file_get_contents(__DIR__.'/profile.md'),
            'published' => true,
            'publishedAt' => new \DateTime(),
        ]));

        $manager->flush();
    }
}
