<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends BaseFixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $catAction = $this->getCategory(CategoryFixtures::REF_ACTION);
        $catSF = $this->getCategory(CategoryFixtures::REF_SF);
        $catComedie = $this->getCategory(CategoryFixtures::REF_COMEDIE);
        $catDrame = $this->getCategory(CategoryFixtures::REF_DRAME);

        $franchiseFF = $this->getFranchise(FranchiseFixtures::REF_F_F);
        $franchiseSW = $this->getFranchise(FranchiseFixtures::REF_S_W);
        $franchiseHP = $this->getFranchise(FranchiseFixtures::REF_H_P);

        $manager->persist(Movie::build('Fast & Furious 10', 'La course continue avec plus d\'action', $franchiseFF, new ArrayCollection([$catAction]), 'super_admin'));
        $manager->persist(Movie::build('Fast & Furious 11', 'Les voitures les plus rapides du monde', $franchiseFF, new ArrayCollection([$catAction]), 'super_admin'));
        $manager->persist(Movie::build('Fast & Furious 12', 'Nouvelles voitures, nouvelles courses', $franchiseFF, new ArrayCollection([$catAction]), 'super_admin'));
        $manager->persist(Movie::build('Fast & Furious 13', 'La course ultime pour la liberté', $franchiseFF, new ArrayCollection([$catAction]), 'admin'));
        $manager->persist(Movie::build('Harry Potter and the Chamber of Secrets', 'Harry découvre la Chambre des secrets', $franchiseHP, new ArrayCollection([$catSF, $catAction]), 'admin'));
        $manager->persist(Movie::build('Harry Potter and the Prisoner of Azkaban', 'La chasse au prisonnier d\'Azkaban commence', $franchiseHP, new ArrayCollection([$catSF, $catAction]), 'admin'));
        $manager->persist(Movie::build('Harry Potter and the Goblet of Fire', 'La Coupe de Feu met Harry à l\'épreuve', $franchiseHP, new ArrayCollection([$catSF, $catAction]), 'admin'));
        $manager->persist(Movie::build('Star Wars: Episode V - The Empire Strikes Back', 'La bataille continue contre l\'Empire', $franchiseSW, new ArrayCollection([$catSF]), 'admin'));
        $manager->persist(Movie::build('Star Wars: Episode VI - Return of the Jedi', 'La conclusion de la saga', $franchiseSW, new ArrayCollection([$catSF]), 'admin'));
        $manager->persist(Movie::build('Star Wars: Episode VII - The Force Awakens', 'Le réveil de la Force', $franchiseSW, new ArrayCollection([$catSF]), 'admin'));

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            FranchiseFixtures::class
        ];
    }
}
