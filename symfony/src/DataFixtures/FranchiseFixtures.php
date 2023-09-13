<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Franchise;
use Doctrine\Persistence\ObjectManager;

class FranchiseFixtures extends BaseFixture
{
    public const REF_F_F = 'franchise-fast-and-furious';
    public const REF_H_P = 'franchise-harry-potter';
    public const REF_S_W = 'franchise-star-wars';

    public function load(ObjectManager $manager): void
    {
        $this->persistAndRef($manager, self::REF_F_F, Franchise::build('Fast and Furious'));
        $this->persistAndRef($manager, self::REF_H_P, Franchise::build('Harry Potter'));
        $this->persistAndRef($manager, self::REF_S_W, Franchise::build('Star Wars'));

        $manager->flush();
    }

}
