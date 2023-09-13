<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Franchise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

abstract class BaseFixture extends Fixture
{

    public function persistAndRef(ObjectManager $manager, string $ref, $object) {
        $manager->persist($object);
        $this->setReference($ref, $object);
        return $object;
    }

    /**
     * @return Category
     * @noinspection PhpIncompatibleReturnTypeInspection
     */
    public function getCategory(string $ref) {
        return $this->getReference($ref);
    }

    /**
     * @return Franchise
     * @noinspection PhpIncompatibleReturnTypeInspection
     */
    public function getFranchise(string $ref) {
        return $this->getReference($ref);
    }

}
