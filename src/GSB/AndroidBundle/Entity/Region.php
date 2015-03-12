<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="REGION", indexes={@ORM\Index(name="FK_REGION_SECTEUR", columns={"SEC_CODE"})})
 * @ORM\Entity
 */
class Region
{
    /**
     * @var string
     *
     * @ORM\Column(name="REG_CODE", type="string", length=4, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="REG_NOM", type="string", length=100, nullable=true)
     */
    private $regNom;

    /**
     * @var \Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SEC_CODE", referencedColumnName="SEC_CODE")
     * })
     */
    private $secCode;



    /**
     * Get regCode
     *
     * @return string 
     */
    public function getRegCode()
    {
        return $this->regCode;
    }

    /**
     * Set regNom
     *
     * @param string $regNom
     * @return Region
     */
    public function setRegNom($regNom)
    {
        $this->regNom = $regNom;

        return $this;
    }

    /**
     * Get regNom
     *
     * @return string 
     */
    public function getRegNom()
    {
        return $this->regNom;
    }

    /**
     * Set secCode
     *
     * @param \GSB\AndroidBundle\Entity\Secteur $secCode
     * @return Region
     */
    public function setSecCode(\GSB\AndroidBundle\Entity\Secteur $secCode = null)
    {
        $this->secCode = $secCode;

        return $this;
    }

    /**
     * Get secCode
     *
     * @return \GSB\AndroidBundle\Entity\Secteur 
     */
    public function getSecCode()
    {
        return $this->secCode;
    }
}
