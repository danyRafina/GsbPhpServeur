<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescrire
 *
 * @ORM\Table(name="PRESCRIRE", indexes={@ORM\Index(name="FK_PRESCRIRE_TYPE_INDIVIDU", columns={"TIN_CODE"}), @ORM\Index(name="FK_PRESCRIRE_DOSAGE", columns={"DOS_CODE"}), @ORM\Index(name="IDX_905658D2FE43D160", columns={"MED_DEPOTLEGAL"})})
 * @ORM\Entity
 */
class Prescrire
{
    /**
     * @var string
     *
     * @ORM\Column(name="PRE_POSOLOGIE", type="string", length=80, nullable=true)
     */
    private $prePosologie;

    /**
     * @var \Dosage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Dosage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DOS_CODE", referencedColumnName="DOS_CODE")
     * })
     */
    private $dosCode;

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
     * @var \TypeIndividu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TypeIndividu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TIN_CODE", referencedColumnName="TIN_CODE")
     * })
     */
    private $tinCode;



    /**
     * Set prePosologie
     *
     * @param string $prePosologie
     * @return Prescrire
     */
    public function setPrePosologie($prePosologie)
    {
        $this->prePosologie = $prePosologie;

        return $this;
    }

    /**
     * Get prePosologie
     *
     * @return string 
     */
    public function getPrePosologie()
    {
        return $this->prePosologie;
    }

    /**
     * Set dosCode
     *
     * @param \GSB\AndroidBundle\Entity\Dosage $dosCode
     * @return Prescrire
     */
    public function setDosCode(\GSB\AndroidBundle\Entity\Dosage $dosCode)
    {
        $this->dosCode = $dosCode;

        return $this;
    }

    /**
     * Get dosCode
     *
     * @return \GSB\AndroidBundle\Entity\Dosage 
     */
    public function getDosCode()
    {
        return $this->dosCode;
    }

    /**
     * Set medDepotlegal
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medDepotlegal
     * @return Prescrire
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

    /**
     * Set tinCode
     *
     * @param \GSB\AndroidBundle\Entity\TypeIndividu $tinCode
     * @return Prescrire
     */
    public function setTinCode(\GSB\AndroidBundle\Entity\TypeIndividu $tinCode)
    {
        $this->tinCode = $tinCode;

        return $this;
    }

    /**
     * Get tinCode
     *
     * @return \GSB\AndroidBundle\Entity\TypeIndividu 
     */
    public function getTinCode()
    {
        return $this->tinCode;
    }
}
