<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="player_abilities")
 * @ORM\Entity
 */
class PlayerAbilities
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
     * @var int
     *
     * @ORM\Column(name="experience", type="smallint", nullable=true)
     */
    private $experience;

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
     * @return PlayerAbilities
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
     * @return PlayerAbilities
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
     * @return PlayerAbilities
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
     * @return PlayerAbilities
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
     * @return PlayerAbilities
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
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param $experience
     *
     * @return $this
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
