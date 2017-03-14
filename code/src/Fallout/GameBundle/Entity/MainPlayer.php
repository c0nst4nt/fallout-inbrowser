<?php

namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="main_player")
 * @ORM\Entity
 */
class MainPlayer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="smallint", nullable=true)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="strength", type="smallint", nullable=true)
     */
    private $strength;

    /**
     * @var integer
     *
     * @ORM\Column(name="agility", type="smallint", nullable=true)
     */
    private $agility;

    /**
     * @var integer
     *
     * @ORM\Column(name="perceive", type="smallint", nullable=true)
     */
    private $perceive;

    /**
     * @var integer
     *
     * @ORM\Column(name="luck", type="smallint", nullable=true)
     */
    private $luck;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param integer $level
     *
     * @return MainPlayer
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param integer $strength
     *
     * @return MainPlayer
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param integer $agility
     *
     * @return MainPlayer
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;

        return $this;
    }

    /**
     * @return integer
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @param integer $perceive
     *
     * @return MainPlayer
     */
    public function setPerceive($perceive)
    {
        $this->perceive = $perceive;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPerceive()
    {
        return $this->perceive;
    }

    /**
     * @param integer $luck
     *
     * @return MainPlayer
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
