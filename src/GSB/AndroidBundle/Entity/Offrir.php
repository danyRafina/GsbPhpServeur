<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offrir
 *
 * @ORM\Table(name="OFFRIR", indexes={@ORM\Index(name="FK_OFFRIR_MEDICAMENT", columns={"MED_DEPOTLEGAL"}), @ORM\Index(name="IDX_EDE68D5869F01356", columns={"COL_MATRICULE"})})
 * @ORM\Entity
 */
class Offrir
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RAP_NUM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rapNum = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="OFF_QTE", type="integer", nullable=true)
     */
    private $offQte;

    /**
     * @var \Collaborateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Collaborateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="COL_MATRICULE", referencedColumnName="COL_MATRICULE")
     * })
     */
    private $colMatricule;

    /**
     * @var \Medicament
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Medicament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MED_DEPOTLEGAL", referencedColumnName="MED_DEPOTLEGAL")
     * })
     */
    private $medDepotlegal;



    /**
     * Set rapNum
     *
     * @param integer $rapNum
     * @return Offrir
     */
    public function setRapNum($rapNum)
    {
        $this->rapNum = $rapNum;

        return $this;
    }

    /**
     * Get rapNum
     *
     * @return integer 
     */
    public function getRapNum()
    {
        return $this->rapNum;
    }

    /**
     * Set offQte
     *
     * @param integer $offQte
     * @return Offrir
     */
    public function setOffQte($offQte)
    {
        $this->offQte = $offQte;

        return $this;
    }

    /**
     * Get offQte
     *
     * @return integer 
     */
    public function getOffQte()
    {
        return $this->offQte;
    }

    /**
     * Set colMatricule
     *
     * @param \GSB\AndroidBundle\Entity\Collaborateur $colMatricule
     * @return Offrir
     */
    public function setColMatricule(\GSB\AndroidBundle\Entity\Collaborateur $colMatricule)
    {
        $this->colMatricule = $colMatricule;

        return $this;
    }

    /**
     * Get colMatricule
     *
     * @return \GSB\AndroidBundle\Entity\Collaborateur 
     */
    public function getColMatricule()
    {
        return $this->colMatricule;
    }

    /**
     * Set medDepotlegal
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medDepotlegal
     * @return Offrir
     */
    public function setMedDepotlegal(\GSB\AndroidBundle\Entity\Medicament $medDepotlegal)
    {
        $this->medDepotlegal = $medDepotlegal;

        return $this;
    }

    /**
     * Get medDepotlegal
     *
     * @return \GSB\AndroidBundle\Entity\Medicament 
     */
    public function getMedDepotlegal()
    {
        return $this->medDepotlegal;
    }
}
