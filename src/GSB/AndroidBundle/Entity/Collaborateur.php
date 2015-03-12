<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collaborateur
 *
 * @ORM\Table(name="COLLABORATEUR", indexes={@ORM\Index(name="FK_COLLABORATEUR_SECTEUR", columns={"SEC_CODE"}), @ORM\Index(name="FK_COLLABORATEUR_LABORATOIRE", columns={"LAB_CODE"})})
 *  @ORM\Entity(repositoryClass="GSB\AndroidBundle\Entity\CollaborateurRepository")
 */
class Collaborateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="COL_MATRICULE", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $colMatricule = '';

    /**
     * @var string
     *
     * @ORM\Column(name="COL_NOM", type="string", length=50, nullable=true)
     */
    private $colNom;

    /**
     * @var string
     *
     * @ORM\Column(name="COL_MDP", type="string", length=20, nullable=false)
     */
    private $colMdp;

    /**
     * @var string
     *
     * @ORM\Column(name="COL_PRENOM", type="string", length=100, nullable=true)
     */
    private $colPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="COL_ADRESSE", type="string", length=100, nullable=true)
     */
    private $colAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="COL_CP", type="string", length=10, nullable=true)
     */
    private $colCp;

    /**
     * @var string
     *
     * @ORM\Column(name="COL_VILLE", type="string", length=60, nullable=true)
     */
    private $colVille;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="COL_DATEEMBAUCHE", type="date", nullable=true)
     */
    private $colDateembauche;

    /**
     * @var \Laboratoire
     *
     * @ORM\ManyToOne(targetEntity="Laboratoire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="LAB_CODE", referencedColumnName="LAB_CODE")
     * })
     */
    private $labCode;

    /**
     * @var \Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SEC_CODE", referencedColumnName="SEC_CODE")
     * })
     */
    private $secCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ActiviteCompl", mappedBy="colMatricule")
     */
    private $acNum;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acNum = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get colMatricule
     *
     * @return string 
     */
    public function getColMatricule()
    {
        return $this->colMatricule;
    }

    /**
     * Set colNom
     *
     * @param string $colNom
     * @return Collaborateur
     */
    public function setColNom($colNom)
    {
        $this->colNom = $colNom;

        return $this;
    }

    /**
     * Get colNom
     *
     * @return string 
     */
    public function getColNom()
    {
        return $this->colNom;
    }

    /**
     * Set colMdp
     *
     * @param string $colMdp
     * @return Collaborateur
     */
    public function setColMdp($colMdp)
    {
        $this->colMdp = $colMdp;

        return $this;
    }

    /**
     * Get colMdp
     *
     * @return string 
     */
    public function getColMdp()
    {
        return $this->colMdp;
    }

    /**
     * Set colPrenom
     *
     * @param string $colPrenom
     * @return Collaborateur
     */
    public function setColPrenom($colPrenom)
    {
        $this->colPrenom = $colPrenom;

        return $this;
    }

    /**
     * Get colPrenom
     *
     * @return string 
     */
    public function getColPrenom()
    {
        return $this->colPrenom;
    }

    /**
     * Set colAdresse
     *
     * @param string $colAdresse
     * @return Collaborateur
     */
    public function setColAdresse($colAdresse)
    {
        $this->colAdresse = $colAdresse;

        return $this;
    }

    /**
     * Get colAdresse
     *
     * @return string 
     */
    public function getColAdresse()
    {
        return $this->colAdresse;
    }

    /**
     * Set colCp
     *
     * @param string $colCp
     * @return Collaborateur
     */
    public function setColCp($colCp)
    {
        $this->colCp = $colCp;

        return $this;
    }

    /**
     * Get colCp
     *
     * @return string 
     */
    public function getColCp()
    {
        return $this->colCp;
    }

    /**
     * Set colVille
     *
     * @param string $colVille
     * @return Collaborateur
     */
    public function setColVille($colVille)
    {
        $this->colVille = $colVille;

        return $this;
    }

    /**
     * Get colVille
     *
     * @return string 
     */
    public function getColVille()
    {
        return $this->colVille;
    }

    /**
     * Set colDateembauche
     *
     * @param \DateTime $colDateembauche
     * @return Collaborateur
     */
    public function setColDateembauche($colDateembauche)
    {
        $this->colDateembauche = $colDateembauche;

        return $this;
    }

    /**
     * Get colDateembauche
     *
     * @return \DateTime 
     */
    public function getColDateembauche()
    {
        return $this->colDateembauche;
    }

    /**
     * Set labCode
     *
     * @param \GSB\AndroidBundle\Entity\Laboratoire $labCode
     * @return Collaborateur
     */
    public function setLabCode(\GSB\AndroidBundle\Entity\Laboratoire $labCode = null)
    {
        $this->labCode = $labCode;

        return $this;
    }

    /**
     * Get labCode
     *
     * @return \GSB\AndroidBundle\Entity\Laboratoire 
     */
    public function getLabCode()
    {
        return $this->labCode;
    }

    /**
     * Set secCode
     *
     * @param \GSB\AndroidBundle\Entity\Secteur $secCode
     * @return Collaborateur
     */
    public function setSecCode(\GSB\AndroidBundle\Entity\Secteur $secCode = null)
    {
        $this->secCode = $secCode;

        return $this;
    }

    /**
     * Get secCode
     *
     * @return \GSB\AndroidBundle\Entity\Secteur 
     */
    public function getSecCode()
    {
        return $this->secCode;
    }

    /**
     * Add acNum
     *
     * @param \GSB\AndroidBundle\Entity\ActiviteCompl $acNum
     * @return Collaborateur
     */
    public function addAcNum(\GSB\AndroidBundle\Entity\ActiviteCompl $acNum)
    {
        $this->acNum[] = $acNum;

        return $this;
    }

    /**
     * Remove acNum
     *
     * @param \GSB\AndroidBundle\Entity\ActiviteCompl $acNum
     */
    public function removeAcNum(\GSB\AndroidBundle\Entity\ActiviteCompl $acNum)
    {
        $this->acNum->removeElement($acNum);
    }

    /**
     * Get acNum
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcNum()
    {
        return $this->acNum;
    }
}
