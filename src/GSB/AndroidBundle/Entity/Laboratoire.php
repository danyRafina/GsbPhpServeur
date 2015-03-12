<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratoire
 *
 * @ORM\Table(name="LABORATOIRE")
 * @ORM\Entity
 */
class Laboratoire
{
    /**
     * @var string
     *
     * @ORM\Column(name="LAB_CODE", type="string", length=4, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $labCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="LAB_NOM", type="string", length=20, nullable=true)
     */
    private $labNom;

    /**
     * @var string
     *
     * @ORM\Column(name="LAB_CHEFVENTE", type="string", length=40, nullable=true)
     */
    private $labChefvente;



    /**
     * Get labCode
     *
     * @return string 
     */
    public function getLabCode()
    {
        return $this->labCode;
    }

    /**
     * Set labNom
     *
     * @param string $labNom
     * @return Laboratoire
     */
    public function setLabNom($labNom)
    {
        $this->labNom = $labNom;

        return $this;
    }

    /**
     * Get labNom
     *
     * @return string 
     */
    public function getLabNom()
    {
        return $this->labNom;
    }

    /**
     * Set labChefvente
     *
     * @param string $labChefvente
     * @return Laboratoire
     */
    public function setLabChefvente($labChefvente)
    {
        $this->labChefvente = $labChefvente;

        return $this;
    }

    /**
     * Get labChefvente
     *
     * @return string 
     */
    public function getLabChefvente()
    {
        return $this->labChefvente;
    }
}
