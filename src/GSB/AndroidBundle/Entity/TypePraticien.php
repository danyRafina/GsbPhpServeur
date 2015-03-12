<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePraticien
 *
 * @ORM\Table(name="TYPE_PRATICIEN")
 * @ORM\Entity
 */
class TypePraticien
{
    /**
     * @var string
     *
     * @ORM\Column(name="TYP_CODE", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="TYP_LIBELLE", type="string", length=50, nullable=true)
     */
    private $typLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="TYP_LIEU", type="string", length=70, nullable=true)
     */
    private $typLieu;



    /**
     * Get typCode
     *
     * @return string 
     */
    public function getTypCode()
    {
        return $this->typCode;
    }

    /**
     * Set typLibelle
     *
     * @param string $typLibelle
     * @return TypePraticien
     */
    public function setTypLibelle($typLibelle)
    {
        $this->typLibelle = $typLibelle;

        return $this;
    }

    /**
     * Get typLibelle
     *
     * @return string 
     */
    public function getTypLibelle()
    {
        return $this->typLibelle;
    }

    /**
     * Set typLieu
     *
     * @param string $typLieu
     * @return TypePraticien
     */
    public function setTypLieu($typLieu)
    {
        $this->typLieu = $typLieu;

        return $this;
    }

    /**
     * Get typLieu
     *
     * @return string 
     */
    public function getTypLieu()
    {
        return $this->typLieu;
    }
}
