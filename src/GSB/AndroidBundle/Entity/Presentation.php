<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 *
 * @ORM\Table(name="PRESENTATION")
 * @ORM\Entity
 */
class Presentation
{
    /**
     * @var string
     *
     * @ORM\Column(name="PRE_CODE", type="string", length=4, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $preCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="PRE_LIBELLE", type="string", length=40, nullable=true)
     */
    private $preLibelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Medicament", mappedBy="preCode")
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
     * Get preCode
     *
     * @return string 
     */
    public function getPreCode()
    {
        return $this->preCode;
    }

    /**
     * Set preLibelle
     *
     * @param string $preLibelle
     * @return Presentation
     */
    public function setPreLibelle($preLibelle)
    {
        $this->preLibelle = $preLibelle;

        return $this;
    }

    /**
     * Get preLibelle
     *
     * @return string 
     */
    public function getPreLibelle()
    {
        return $this->preLibelle;
    }

    /**
     * Add medDepotlegal
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medDepotlegal
     * @return Presentation
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
