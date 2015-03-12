<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travailler
 *
 * @ORM\Table(name="TRAVAILLER", indexes={@ORM\Index(name="FK_TRAVAILLER_REGION", columns={"REG_CODE"}), @ORM\Index(name="IDX_9B2DC20269F01356", columns={"COL_MATRICULE"})})
 * @ORM\Entity
 */
class Travailler
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="JJMMAA", type="date", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    //private  $jjmmaa = '0000-00-00';

    /**
     * @var string
     *
     * @ORM\Column(name="TRA_ROLE", type="string", length=22, nullable=true)
     */
    private $traRole;

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
     * @var \Region
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="REG_CODE", referencedColumnName="REG_CODE")
     * })
     */
    private $regCode;



    /**
     * Set jjmmaa
     *
     * @param \DateTime $jjmmaa
     * @return Travailler
     */
    public function setJjmmaa($jjmmaa)
    {
        $this->jjmmaa = $jjmmaa;

        return $this;
    }

    /**
     * Get jjmmaa
     *
     * @return \DateTime 
     */
    public function getJjmmaa()
    {
        return $this->jjmmaa->format('d-m-Y');
    }

    /**
     * Set traRole
     *
     * @param string $traRole
     * @return Travailler
     */
    public function setTraRole($traRole)
    {
        $this->traRole = $traRole;

        return $this;
    }

    /**
     * Get traRole
     *
     * @return string 
     */
    public function getTraRole()
    {
        return $this->traRole;
    }

    /**
     * Set colMatricule
     *
     * @param \GSB\AndroidBundle\Entity\Collaborateur $colMatricule
     * @return Travailler
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
     * Set regCode
     *
     * @param \GSB\AndroidBundle\Entity\Region $regCode
     * @return Travailler
     */
    public function setRegCode(\GSB\AndroidBundle\Entity\Region $regCode)
    {
        $this->regCode = $regCode;

        return $this;
    }

    /**
     * Get regCode
     *
     * @return \GSB\AndroidBundle\Entity\Region 
     */
    public function getRegCode()
    {
        return $this->regCode;
    }
}
