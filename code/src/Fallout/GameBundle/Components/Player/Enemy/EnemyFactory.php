<?php
namespace Fallout\GameBundle\Components\Player\Enemy;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Main\MainPlayer;

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
        // TODO: include also enemy attack and moves to query
        return $this->entityManager->createQuery(
            'SELECT p FROM GameBundle:Player p 
             WHERE p.health = :health AND p.name <> :playerName'
        )->setParameter('health', $health)
        ->setParameter('playerName', MainPlayer::PLAYER_NAME)
        ->getOneOrNullResult();
    }
}