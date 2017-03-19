<?php
namespace Fallout\GameBundle\Components\Player\Enemy;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Main\MainPlayer;
use Fallout\GameBundle\Entity\Player;

class EnemyFactory
{
    const GUESS_COEFFICIENT = 10;

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

    /**
     * @param int $health
     * @param int $attack
     * @param int $moves
     * @return null|Player
     */
    public function createEnemyPlayer($health, $attack, $moves)
    {
        // TODO: include also enemy attack and moves to query
        $enemyPlayer = $this->tryGetPlayer($health);
        if (empty($enemyPlayer)) {
            $health += self::GUESS_COEFFICIENT;
            $enemyPlayer = $this->tryGetPlayer($health);

            if (empty($enemyPlayer)) {
                $health = $health - (self::GUESS_COEFFICIENT * 2);
                $enemyPlayer = $this->tryGetPlayer($health);
            }
        }

        return is_array($enemyPlayer) ? array_shift($enemyPlayer) : $enemyPlayer;
    }

    /**
     * @param int $health
     * @return null|Player
     */
    private function tryGetPlayer($health)
    {
        return $this->entityManager->createQuery(
            'SELECT p FROM GameBundle:Player p 
             WHERE p.health = :health AND p.name <> :playerName'
        )->setParameter('health', $health)
        ->setParameter('playerName', MainPlayer::PLAYER_NAME)
        ->setMaxResults(1)
        ->getResult();
    }
}