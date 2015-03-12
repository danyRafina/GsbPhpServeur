<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composant
 *
 * @ORM\Table(name="COMPOSANT")
 * @ORM\Entity
 */
class Composant
{
    /**
     * @var string
     *
     * @ORM\Column(name="CMP_CODE", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cmpCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="CMP_LIBELLE", type="string", length=50, nullable=true)
     */
    private $cmpLibelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Medicament", mappedBy="cmpCode")
     */
    private $medDepotlegal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medDepotlegal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get cmpCode
     *
     * @return string 
     */
    public function getCmpCode()
    {
        return $this->cmpCode;
    }

    /**
     * Set cmpLibelle
     *
     * @param string $cmpLibelle
     * @return Composant
     */
    public function setCmpLibelle($cmpLibelle)
    {
        $this->cmpLibelle = $cmpLibelle;

        return $this;
    }

    /**
     * Get cmpLibelle
     *
     * @return string 
     */
    public function getCmpLibelle()
    {
        return $this->cmpLibelle;
    }

    /**
     * Add medDepotlegal
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medDepotlegal
     * @return Composant
     */
    public function addMedDepotlegal(\GSB\AndroidBundle\Entity\Medicament $medDepotlegal)
    {
        $this->medDepotlegal[] = $medDepotlegal;

        return $this;
    }

    /**
     * Remove medDepotlegal
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medDepotlegal
     */
    public function removeMedDepotlegal(\GSB\AndroidBundle\Entity\Medicament $medDepotlegal)
    {
        $this->medDepotlegal->removeElement($medDepotlegal);
    }

    /**
     * Get medDepotlegal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedDepotlegal()
    {
        return $this->medDepotlegal;
    }
}
