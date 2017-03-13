<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="discover_scenario")
 * @ORM\Entity
 */
class DiscoverScenario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="items_count", type="smallint", nullable=true)
     */
    private $itemsCount;

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

