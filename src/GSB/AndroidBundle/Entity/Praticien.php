<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Praticien
 *
 * @ORM\Table(name="PRATICIEN", indexes={@ORM\Index(name="FK_PRATICIEN_TYPE_PRATICIEN", columns={"TYP_CODE"})})
 * @ORM\Entity
 */
class Praticien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PRA_NUM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $praNum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="PRA_NOM", type="string", length=50, nullable=true)
     */
    private $praNom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRA_PRENOM", type="string", length=60, nullable=true)
     */
    private $praPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRA_ADRESSE", type="string", length=100, nullable=true)
     */
    private $praAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="PRA_CP", type="string", length=10, nullable=true)
     */
    private $praCp;

    /**
     * @var string
     *
     * @ORM\Column(name="PRA_VILLE", type="string", length=50, nullable=true)
     */
    private $praVille;

    /**
     * @var float
     *
     * @ORM\Column(name="PRA_COEFNOTORIETE", type="float", precision=10, scale=0, nullable=true)
     */
    private $praCoefnotoriete;

    /**
     * @var \TypePraticien
     *
     * @ORM\ManyToOne(targetEntity="TypePraticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TYP_CODE", referencedColumnName="TYP_CODE")
     * })
     */
    private $typCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ActiviteCompl", mappedBy="praNum")
     */
    private $acNum;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Specialite", inversedBy="praNum")
     * @ORM\JoinTable(name="posseder",
     *   joinColumns={
     *     @ORM\JoinColumn(name="PRA_NUM", referencedColumnName="PRA_NUM")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="SPE_CODE", referencedColumnName="SPE_CODE")
     *   }
     * )
     */
    private $speCode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acNum = new \Doctrine\Common\Collections\ArrayCollection();
        $this->speCode = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get praNum
     *
     * @return integer 
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Set praNom
     *
     * @param string $praNom
     * @return Praticien
     */
    public function setPraNom($praNom)
    {
        $this->praNom = $praNom;

        return $this;
    }

    /**
     * Get praNom
     *
     * @return string 
     */
    public function getPraNom()
    {
        return $this->praNom;
    }

    /**
     * Set praPrenom
     *
     * @param string $praPrenom
     * @return Praticien
     */
    public function setPraPrenom($praPrenom)
    {
        $this->praPrenom = $praPrenom;

        return $this;
    }

    /**
     * Get praPrenom
     *
     * @return string 
     */
    public function getPraPrenom()
    {
        return $this->praPrenom;
    }

    /**
     * Set praAdresse
     *
     * @param string $praAdresse
     * @return Praticien
     */
    public function setPraAdresse($praAdresse)
    {
        $this->praAdresse = $praAdresse;

        return $this;
    }

    /**
     * Get praAdresse
     *
     * @return string 
     */
    public function getPraAdresse()
    {
        return $this->praAdresse;
    }

    /**
     * Set praCp
     *
     * @param string $praCp
     * @return Praticien
     */
    public function setPraCp($praCp)
    {
        $this->praCp = $praCp;

        return $this;
    }

    /**
     * Get praCp
     *
     * @return string 
     */
    public function getPraCp()
    {
        return $this->praCp;
    }

    /**
     * Set praVille
     *
     * @param string $praVille
     * @return Praticien
     */
    public function setPraVille($praVille)
    {
        $this->praVille = $praVille;

        return $this;
    }

    /**
     * Get praVille
     *
     * @return string 
     */
    public function getPraVille()
    {
        return $this->praVille;
    }

    /**
     * Set praCoefnotoriete
     *
     * @param float $praCoefnotoriete
     * @return Praticien
     */
    public function setPraCoefnotoriete($praCoefnotoriete)
    {
        $this->praCoefnotoriete = $praCoefnotoriete;

        return $this;
    }

    /**
     * Get praCoefnotoriete
     *
     * @return float 
     */
    public function getPraCoefnotoriete()
    {
        return $this->praCoefnotoriete;
    }

    /**
     * Set typCode
     *
     * @param \GSB\AndroidBundle\Entity\TypePraticien $typCode
     * @return Praticien
     */
    public function setTypCode(\GSB\AndroidBundle\Entity\TypePraticien $typCode = null)
    {
        $this->typCode = $typCode;

        return $this;
    }

    /**
     * Get typCode
     *
     * @return \GSB\AndroidBundle\Entity\TypePraticien 
     */
    public function getTypCode()
    {
        return $this->typCode;
    }

    /**
     * Add acNum
     *
     * @param \GSB\AndroidBundle\Entity\ActiviteCompl $acNum
     * @return Praticien
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

    /**
     * Add speCode
     *
     * @param \GSB\AndroidBundle\Entity\Specialite $speCode
     * @return Praticien
     */
    public function addSpeCode(\GSB\AndroidBundle\Entity\Specialite $speCode)
    {
        $this->speCode[] = $speCode;

        return $this;
    }

    /**
     * Remove speCode
     *
     * @param \GSB\AndroidBundle\Entity\Specialite $speCode
     */
    public function removeSpeCode(\GSB\AndroidBundle\Entity\Specialite $speCode)
    {
        $this->speCode->removeElement($speCode);
    }

    /**
     * Get speCode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpeCode()
    {
        return $this->speCode;
    }
}
