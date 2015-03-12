<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicament
 *
 * @ORM\Table(name="MEDICAMENT", indexes={@ORM\Index(name="FK_MEDICAMENT_FAMILLE", columns={"FAM_CODE"})})
 * @ORM\Entity
 */
class Medicament
{
    /**
     * @var string
     *
     * @ORM\Column(name="MED_DEPOTLEGAL", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $medDepotlegal = '';

    /**
     * @var string
     *
     * @ORM\Column(name="MED_NOMCOMMERCIAL", type="string", length=50, nullable=true)
     */
    private $medNomcommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="MED_COMPOSITION", type="string", length=510, nullable=true)
     */
    private $medComposition;

    /**
     * @var string
     *
     * @ORM\Column(name="MED_EFFETS", type="string", length=510, nullable=true)
     */
    private $medEffets;

    /**
     * @var string
     *
     * @ORM\Column(name="MED_CONTREINDIC", type="string", length=510, nullable=true)
     */
    private $medContreindic;

    /**
     * @var float
     *
     * @ORM\Column(name="MED_PRIXECHANTILLON", type="float", precision=10, scale=0, nullable=true)
     */
    private $medPrixechantillon;

    /**
     * @var \Famille
     *
     * @ORM\ManyToOne(targetEntity="Famille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FAM_CODE", referencedColumnName="FAM_CODE")
     * })
     */
    private $famCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Composant", inversedBy="medDepotlegal")
     * @ORM\JoinTable(name="constituer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="MED_DEPOTLEGAL", referencedColumnName="MED_DEPOTLEGAL")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CMP_CODE", referencedColumnName="CMP_CODE")
     *   }
     * )
     */
    private $cmpCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Presentation", inversedBy="medDepotlegal")
     * @ORM\JoinTable(name="formuler",
     *   joinColumns={
     *     @ORM\JoinColumn(name="MED_DEPOTLEGAL", referencedColumnName="MED_DEPOTLEGAL")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="PRE_CODE", referencedColumnName="PRE_CODE")
     *   }
     * )
     */
    private $preCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Medicament", inversedBy="medPerturbateur")
     * @ORM\JoinTable(name="interagir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="MED_PERTURBATEUR", referencedColumnName="MED_DEPOTLEGAL")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="MED_PERTURBE", referencedColumnName="MED_DEPOTLEGAL")
     *   }
     * )
     */
    private $medPerturbe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cmpCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->preCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medPerturbe = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get medDepotlegal
     *
     * @return string 
     */
    public function getMedDepotlegal()
    {
        return $this->medDepotlegal;
    }

    /**
     * Set medNomcommercial
     *
     * @param string $medNomcommercial
     * @return Medicament
     */
    public function setMedNomcommercial($medNomcommercial)
    {
        $this->medNomcommercial = $medNomcommercial;

        return $this;
    }

    /**
     * Get medNomcommercial
     *
     * @return string 
     */
    public function getMedNomcommercial()
    {
        return $this->medNomcommercial;
    }

    /**
     * Set medComposition
     *
     * @param string $medComposition
     * @return Medicament
     */
    public function setMedComposition($medComposition)
    {
        $this->medComposition = $medComposition;

        return $this;
    }

    /**
     * Get medComposition
     *
     * @return string 
     */
    public function getMedComposition()
    {
        return $this->medComposition;
    }

    /**
     * Set medEffets
     *
     * @param string $medEffets
     * @return Medicament
     */
    public function setMedEffets($medEffets)
    {
        $this->medEffets = $medEffets;

        return $this;
    }

    /**
     * Get medEffets
     *
     * @return string 
     */
    public function getMedEffets()
    {
        return $this->medEffets;
    }

    /**
     * Set medContreindic
     *
     * @param string $medContreindic
     * @return Medicament
     */
    public function setMedContreindic($medContreindic)
    {
        $this->medContreindic = $medContreindic;

        return $this;
    }

    /**
     * Get medContreindic
     *
     * @return string 
     */
    public function getMedContreindic()
    {
        return $this->medContreindic;
    }

    /**
     * Set medPrixechantillon
     *
     * @param float $medPrixechantillon
     * @return Medicament
     */
    public function setMedPrixechantillon($medPrixechantillon)
    {
        $this->medPrixechantillon = $medPrixechantillon;

        return $this;
    }

    /**
     * Get medPrixechantillon
     *
     * @return float 
     */
    public function getMedPrixechantillon()
    {
        return $this->medPrixechantillon;
    }

    /**
     * Set famCode
     *
     * @param \GSB\AndroidBundle\Entity\Famille $famCode
     * @return Medicament
     */
    public function setFamCode(\GSB\AndroidBundle\Entity\Famille $famCode = null)
    {
        $this->famCode = $famCode;

        return $this;
    }

    /**
     * Get famCode
     *
     * @return \GSB\AndroidBundle\Entity\Famille 
     */
    public function getFamCode()
    {
        return $this->famCode;
    }

    /**
     * Add cmpCode
     *
     * @param \GSB\AndroidBundle\Entity\Composant $cmpCode
     * @return Medicament
     */
    public function addCmpCode(\GSB\AndroidBundle\Entity\Composant $cmpCode)
    {
        $this->cmpCode[] = $cmpCode;

        return $this;
    }

    /**
     * Remove cmpCode
     *
     * @param \GSB\AndroidBundle\Entity\Composant $cmpCode
     */
    public function removeCmpCode(\GSB\AndroidBundle\Entity\Composant $cmpCode)
    {
        $this->cmpCode->removeElement($cmpCode);
    }

    /**
     * Get cmpCode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCmpCode()
    {
        return $this->cmpCode;
    }

    /**
     * Add preCode
     *
     * @param \GSB\AndroidBundle\Entity\Presentation $preCode
     * @return Medicament
     */
    public function addPreCode(\GSB\AndroidBundle\Entity\Presentation $preCode)
    {
        $this->preCode[] = $preCode;

        return $this;
    }

    /**
     * Remove preCode
     *
     * @param \GSB\AndroidBundle\Entity\Presentation $preCode
     */
    public function removePreCode(\GSB\AndroidBundle\Entity\Presentation $preCode)
    {
        $this->preCode->removeElement($preCode);
    }

    /**
     * Get preCode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreCode()
    {
        return $this->preCode;
    }

    /**
     * Add medPerturbe
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medPerturbe
     * @return Medicament
     */
    public function addMedPerturbe(\GSB\AndroidBundle\Entity\Medicament $medPerturbe)
    {
        $this->medPerturbe[] = $medPerturbe;

        return $this;
    }

    /**
     * Remove medPerturbe
     *
     * @param \GSB\AndroidBundle\Entity\Medicament $medPerturbe
     */
    public function removeMedPerturbe(\GSB\AndroidBundle\Entity\Medicament $medPerturbe)
    {
        $this->medPerturbe->removeElement($medPerturbe);
    }

    /**
     * Get medPerturbe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedPerturbe()
    {
        return $this->medPerturbe;
    }
}
