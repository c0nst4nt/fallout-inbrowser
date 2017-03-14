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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param integer $itemsCount
     *
     * @return DiscoverScenario
     */
    public function setItemsCount($itemsCount)
    {
        $this->itemsCount = $itemsCount;

        return $this;
    }

    /**
     * @return integer
     */
    public function getItemsCount()
    {
        return $this->itemsCount;
    }

    /**
     * @param integer $minHealth
     *
     * @return DiscoverScenario
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
     * @return DiscoverScenario
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
