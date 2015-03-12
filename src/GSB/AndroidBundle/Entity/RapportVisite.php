<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RapportVisite
 *
 * @ORM\Table(name="RAPPORT_VISITE", indexes={@ORM\Index(name="FK_RAP_MOTIF", columns={"RAP_MOTIF"}), @ORM\Index(name="FK_RAPPORT_VISITE_PRATICIEN", columns={"PRA_NUM"}), @ORM\Index(name="IDX_F54202D069F01356", columns={"COL_MATRICULE"})})
 * @ORM\Entity
 */
class RapportVisite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RAP_NUM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rapNum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RAP_DATE", type="date", nullable=true)
     */
    private $rapDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_VISITE", type="date", nullable=false)
     */
    private $dateVisite;

    /**
     * @var string
     *
     * @ORM\Column(name="RAP_BILAN", type="string", length=510, nullable=true)
     */
    private $rapBilan;

    /**
     * @var integer
     *
     * @ORM\Column(name="COEF_CONF", type="integer", nullable=true)
     */
    private $coefConf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="RAP_EST_LU", type="boolean", nullable=true)
     */
    private $rapEstLu = 'b\'0\'';

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
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PRA_NUM", referencedColumnName="PRA_NUM")
     * })
     */
    private $praNum;

    /**
     * @var \Motif
     *
     * @ORM\ManyToOne(targetEntity="Motif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RAP_MOTIF", referencedColumnName="MOT_NUM")
     * })
     */
    private $rapMotif;



    /**
     * Set rapNum
     *
     * @param integer $rapNum
     * @return RapportVisite
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
     * Set rapDate
     *
     * @param \DateTime $rapDate
     * @return RapportVisite
     */
    public function setRapDate($rapDate)
    {
        $this->rapDate = $rapDate;

        return $this;
    }

    /**
     * Get rapDate
     *
     * @return \DateTime 
     */
    public function getRapDate()
    {
        return $this->rapDate;
    }

    /**
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     * @return RapportVisite
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    /**
     * Get dateVisite
     *
     * @return \DateTime 
     */
    public function getDateVisite()
    {
        return $this->dateVisite;
    }

    /**
     * Set rapBilan
     *
     * @param string $rapBilan
     * @return RapportVisite
     */
    public function setRapBilan($rapBilan)
    {
        $this->rapBilan = $rapBilan;

        return $this;
    }

    /**
     * Get rapBilan
     *
     * @return string 
     */
    public function getRapBilan()
    {
        return $this->rapBilan;
    }

    /**
     * Set coefConf
     *
     * @param integer $coefConf
     * @return RapportVisite
     */
    public function setCoefConf($coefConf)
    {
        $this->coefConf = $coefConf;

        return $this;
    }

    /**
     * Get coefConf
     *
     * @return integer 
     */
    public function getCoefConf()
    {
        return $this->coefConf;
    }

    /**
     * Set rapEstLu
     *
     * @param boolean $rapEstLu
     * @return RapportVisite
     */
    public function setRapEstLu($rapEstLu)
    {
        $this->rapEstLu = $rapEstLu;

        return $this;
    }

    /**
     * Get rapEstLu
     *
     * @return boolean 
     */
    public function getRapEstLu()
    {
        return $this->rapEstLu;
    }

    /**
     * Set colMatricule
     *
     * @param \GSB\AndroidBundle\Entity\Collaborateur $colMatricule
     * @return RapportVisite
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
     * Set praNum
     *
     * @param \GSB\AndroidBundle\Entity\Praticien $praNum
     * @return RapportVisite
     */
    public function setPraNum(\GSB\AndroidBundle\Entity\Praticien $praNum = null)
    {
        $this->praNum = $praNum;

        return $this;
    }

    /**
     * Get praNum
     *
     * @return \GSB\AndroidBundle\Entity\Praticien 
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Set rapMotif
     *
     * @param \GSB\AndroidBundle\Entity\Motif $rapMotif
     * @return RapportVisite
     */
    public function setRapMotif(\GSB\AndroidBundle\Entity\Motif $rapMotif = null)
    {
        $this->rapMotif = $rapMotif;

        return $this;
    }

    /**
     * Get rapMotif
     *
     * @return \GSB\AndroidBundle\Entity\Motif 
     */
    public function getRapMotif()
    {
        return $this->rapMotif;
    }
    
    public function __toString() {
        $r = $this->getRapNum()."";
        return $r;
    }
}
