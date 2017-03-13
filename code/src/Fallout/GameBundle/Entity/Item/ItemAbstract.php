<?php
namespace Fallout\GameBundle\Entity\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="item")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "weapon" = "WeaponItem",
 *      "armor" = "ArmorItem",
 *      "health" = "HealthItem",
 * })
 */
class ItemAbstract
{
    const TYPE_NAME = null;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_level", type="smallint", nullable=true)
     */
    private $minLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param string $name
     *
     * @return ItemAbstract
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param integer $value
     *
     * @return ItemAbstract
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param integer $minLevel
     *
     * @return ItemAbstract
     */
    public function setMinLevel($minLevel)
    {
        $this->minLevel = $minLevel;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMinLevel()
    {
        return $this->minLevel;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
