<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fight_scenario")
 * @ORM\Entity
 */
class FightScenario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="enemies_count", type="smallint", nullable=true)
     */
    private $enemiesCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_health", type="smallint", nullable=true)
     */
    private $minHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_health", type="smallint", nullable=true)
     */
    private $maxHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_attack", type="smallint", nullable=true)
     */
    private $minAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_attack", type="smallint", nullable=true)
     */
    private $maxAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="moves", type="smallint", nullable=true)
     */
    private $moves;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param integer $enemiesCount
     *
     * @return FightScenario
     */
    public function setEnemiesCount($enemiesCount)
    {
        $this->enemiesCount = $enemiesCount;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEnemiesCount()
    {
        return $this->enemiesCount;
    }

    /**
     * @param integer $minHealth
     *
     * @return FightScenario
     */
    public function setMinHealth($minHealth)
    {
        $this->minHealth = $minHealth;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMinHealth()
    {
        return $this->minHealth;
    }

    /**
     * @param integer $maxHealth
     *
     * @return FightScenario
     */
    public function setMaxHealth($maxHealth)
    {
        $this->maxHealth = $maxHealth;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxHealth()
    {
        return $this->maxHealth;
    }

    /**
     * @param integer $minAttack
     *
     * @return FightScenario
     */
    public function setMinAttack($minAttack)
    {
        $this->minAttack = $minAttack;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMinAttack()
    {
        return $this->minAttack;
    }

    /**
     * @param integer $maxAttack
     *
     * @return FightScenario
     */
    public function setMaxAttack($maxAttack)
    {
        $this->maxAttack = $maxAttack;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxAttack()
    {
        return $this->maxAttack;
    }

    /**
     * @param integer $moves
     *
     * @return FightScenario
     */
    public function setMoves($moves)
    {
        $this->moves = $moves;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
