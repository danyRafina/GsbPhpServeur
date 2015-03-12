<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dosage
 *
 * @ORM\Table(name="DOSAGE")
 * @ORM\Entity
 */
class Dosage
{
    /**
     * @var string
     *
     * @ORM\Column(name="DOS_CODE", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dosCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="DOS_QUANTITE", type="string", length=20, nullable=true)
     */
    private $dosQuantite;

    /**
     * @var string
     *
     * @ORM\Column(name="DOS_UNITE", type="string", length=20, nullable=true)
     */
    private $dosUnite;



    /**
     * Get dosCode
     *
     * @return string 
     */
    public function getDosCode()
    {
        return $this->dosCode;
    }

    /**
     * Set dosQuantite
     *
     * @param string $dosQuantite
     * @return Dosage
     */
    public function setDosQuantite($dosQuantite)
    {
        $this->dosQuantite = $dosQuantite;

        return $this;
    }

    /**
     * Get dosQuantite
     *
     * @return string 
     */
    public function getDosQuantite()
    {
        return $this->dosQuantite;
    }

    /**
     * Set dosUnite
     *
     * @param string $dosUnite
     * @return Dosage
     */
    public function setDosUnite($dosUnite)
    {
        $this->dosUnite = $dosUnite;

        return $this;
    }

    /**
     * Get dosUnite
     *
     * @return string 
     */
    public function getDosUnite()
    {
        return $this->dosUnite;
    }
}
