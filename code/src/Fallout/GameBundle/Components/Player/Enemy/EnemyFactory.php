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

    public function createEnemyPlayer($health, $attack, $moves)
    {
        return $this->entityManager->createQuery(
            'SELECT p FROM GameBundle:Player p WHERE p.health = :health'
        )->setParameter('health', $health)->getOneOrNullResult();
    }
}