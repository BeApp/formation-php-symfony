<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends BaseFixture
{
    public const REF_ACTION = 'category-action';
    public const REF_COMEDIE = 'category-comedie';
    public const REF_SF = 'category-science-fiction';
    public const REF_DRAME = 'category-drame';

    public function load(ObjectManager $manager): void
    {
        $this->persistAndRef($manager, self::REF_ACTION, Category::build('Action'));
        $this->persistAndRef($manager, self::REF_COMEDIE, Category::build('Comédie'));
        $this->persistAndRef($manager, self::REF_SF, Category::build('Science-Fiction'));
        $this->persistAndRef($manager, self::REF_DRAME, Category::build('Drame'));

        $manager->flush();
    }

}
