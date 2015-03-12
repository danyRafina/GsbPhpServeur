<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialite
 *
 * @ORM\Table(name="SPECIALITE")
 * @ORM\Entity
 */
class Specialite
{
    /**
     * @var string
     *
     * @ORM\Column(name="SPE_CODE", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $speCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="SPE_LIBELLE", type="string", length=300, nullable=true)
     */
    private $speLibelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Praticien", mappedBy="speCode")
     */
    private $praNum;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->praNum = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get speCode
     *
     * @return string 
     */
    public function getSpeCode()
    {
        return $this->speCode;
    }

    /**
     * Set speLibelle
     *
     * @param string $speLibelle
     * @return Specialite
     */
    public function setSpeLibelle($speLibelle)
    {
        $this->speLibelle = $speLibelle;

        return $this;
    }

    /**
     * Get speLibelle
     *
     * @return string 
     */
    public function getSpeLibelle()
    {
        return $this->speLibelle;
    }

    /**
     * Add praNum
     *
     * @param \GSB\AndroidBundle\Entity\Praticien $praNum
     * @return Specialite
     */
    public function addPraNum(\GSB\AndroidBundle\Entity\Praticien $praNum)
    {
        $this->praNum[] = $praNum;

        return $this;
    }

    /**
     * Remove praNum
     *
     * @param \GSB\AndroidBundle\Entity\Praticien $praNum
     */
    public function removePraNum(\GSB\AndroidBundle\Entity\Praticien $praNum)
    {
        $this->praNum->removeElement($praNum);
    }

    /**
     * Get praNum
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPraNum()
    {
        return $this->praNum;
    }
}
