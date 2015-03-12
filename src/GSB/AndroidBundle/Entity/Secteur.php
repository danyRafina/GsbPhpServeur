<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteur
 *
 * @ORM\Table(name="SECTEUR")
 * @ORM\Entity
 */
class Secteur
{
    /**
     * @var string
     *
     * @ORM\Column(name="SEC_CODE", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $secCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="SEC_LIBELLE", type="string", length=30, nullable=true)
     */
    private $secLibelle;



    /**
     * Get secCode
     *
     * @return string 
     */
    public function getSecCode()
    {
        return $this->secCode;
    }

    /**
     * Set secLibelle
     *
     * @param string $secLibelle
     * @return Secteur
     */
    public function setSecLibelle($secLibelle)
    {
        $this->secLibelle = $secLibelle;

        return $this;
    }

    /**
     * Get secLibelle
     *
     * @return string 
     */
    public function getSecLibelle()
    {
        return $this->secLibelle;
    }
}
