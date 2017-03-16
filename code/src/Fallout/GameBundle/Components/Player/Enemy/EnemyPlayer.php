<?php
namespace Fallout\GameBundle\Components\Player\Enemy;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\PlayerAbstract;

class EnemyPlayer extends PlayerAbstract
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

    public function getRewardExperience()
    {
    }

    public function setHealth()
    {
    }

    public function getHealth()
    {
    }

    /**
     * @return string
     */
    public function getName()
    {
    }
}