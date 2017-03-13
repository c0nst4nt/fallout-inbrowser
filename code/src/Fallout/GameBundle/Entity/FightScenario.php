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
     * @ORM\Column(name="scenario_id", type="integer", nullable=true)
     */
    private $scenarioId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
}

