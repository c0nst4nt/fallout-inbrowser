<?php
namespace Fallout\GameBundle\Components\Player\Enemy;

use Doctrine\ORM\EntityManager;

class EnemyFactory
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createEnemyPlayer($health, $armor, $moves)
    {

    }
}