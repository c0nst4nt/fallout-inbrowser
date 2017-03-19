<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="current_scenario")
 * @ORM\Entity
 */
class CurrentScenario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="scenario_id", type="smallint", nullable=true)
     */
    private $scenarioId;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance", type="smallint", nullable=true)
     */
    private $distance;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemy_health", type="smallint", nullable=true)
     */
    private $enemyHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemies_left", type="smallint", nullable=true)
     */
    private $enemiesLeft;

    /**
     * @var bool
     *
     * @ORM\Column(name="fight_started", type="smallint", nullable=true)
     */
    private $fightStarted;

    /**
     * @param integer $scenarioId
     *
     * @return CurrentScenario
     */
    public function setScenarioId($scenarioId)
    {
        $this->scenarioId = $scenarioId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getScenarioId()
    {
        return $this->scenarioId;
    }

    /**
     * @param integer $distance
     *
     * @return CurrentScenario
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param integer $enemyHealth
     *
     * @return CurrentScenario
     */
    public function setEnemyHealth($enemyHealth)
    {
        $this->enemyHealth = $enemyHealth;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEnemyHealth()
    {
        return $this->enemyHealth;
    }

    /**
     * @param integer $enemiesLeft
     *
     * @return CurrentScenario
     */
    public function setEnemiesLeft($enemiesLeft)
    {
        $this->enemiesLeft = $enemiesLeft;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEnemiesLeft()
    {
        return $this->enemiesLeft;
    }

    /**
     * @param bool $fightStarted
     *
     * @return CurrentScenario
     */
    public function setFightStarted($fightStarted)
    {
        $this->fightStarted = $fightStarted;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFightStarted()
    {
        return $this->fightStarted;
    }
}
