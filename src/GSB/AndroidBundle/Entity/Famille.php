<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table(name="FAMILLE")
 * @ORM\Entity
 */
class Famille
{
    /**
     * @var string
     *
     * @ORM\Column(name="FAM_CODE", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $famCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="FAM_LIBELLE", type="string", length=160, nullable=true)
     */
    private $famLibelle;



    /**
     * Get famCode
     *
     * @return string 
     */
    public function getFamCode()
    {
        return $this->famCode;
    }

    /**
     * Set famLibelle
     *
     * @param string $famLibelle
     * @return Famille
     */
    public function setFamLibelle($famLibelle)
    {
        $this->famLibelle = $famLibelle;

        return $this;
    }

    /**
     * Get famLibelle
     *
     * @return string 
     */
    public function getFamLibelle()
    {
        return $this->famLibelle;
    }
}
