<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActiviteCompl
 *
 * @ORM\Table(name="ACTIVITE_COMPL")
 * @ORM\Entity
 */
class ActiviteCompl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="AC_NUM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acNum = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AC_DATE", type="date", nullable=true)
     */
    private $acDate;

    /**
     * @var string
     *
     * @ORM\Column(name="AC_LIEU", type="string", length=50, nullable=true)
     */
    private $acLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="AC_THEME", type="string", length=20, nullable=true)
     */
    private $acTheme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Praticien", inversedBy="acNum")
     * @ORM\JoinTable(name="inviter",
     *   joinColumns={
     *     @ORM\JoinColumn(name="AC_NUM", referencedColumnName="AC_NUM")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="PRA_NUM", referencedColumnName="PRA_NUM")
     *   }
     * )
     */
    private $praNum;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Collaborateur", inversedBy="acNum")
     * @ORM\JoinTable(name="realiser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="AC_NUM", referencedColumnName="AC_NUM")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="COL_MATRICULE", referencedColumnName="COL_MATRICULE")
     *   }
     * )
     */
    private $colMatricule;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->praNum = new \Doctrine\Common\Collections\ArrayCollection();
        $this->colMatricule = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get acNum
     *
     * @return integer 
     */
    public function getAcNum()
    {
        return $this->acNum;
    }

    /**
     * Set acDate
     *
     * @param \DateTime $acDate
     * @return ActiviteCompl
     */
    public function setAcDate($acDate)
    {
        $this->acDate = $acDate;

        return $this;
    }

    /**
     * Get acDate
     *
     * @return \DateTime 
     */
    public function getAcDate()
    {
        return $this->acDate;
    }

    /**
     * Set acLieu
     *
     * @param string $acLieu
     * @return ActiviteCompl
     */
    public function setAcLieu($acLieu)
    {
        $this->acLieu = $acLieu;

        return $this;
    }

    /**
     * Get acLieu
     *
     * @return string 
     */
    public function getAcLieu()
    {
        return $this->acLieu;
    }

    /**
     * Set acTheme
     *
     * @param string $acTheme
     * @return ActiviteCompl
     */
    public function setAcTheme($acTheme)
    {
        $this->acTheme = $acTheme;

        return $this;
    }

    /**
     * Get acTheme
     *
     * @return string 
     */
    public function getAcTheme()
    {
        return $this->acTheme;
    }

    /**
     * Add praNum
     *
     * @param \GSB\AndroidBundle\Entity\Praticien $praNum
     * @return ActiviteCompl
     */
    public function addPraNum(\GSB\AndroidBundle\Entity\Praticien $praNum)
    {
        $this->praNum[] = $praNum;

        return $this;
    }

    /**
     * Remove praNum
     *
     * @param \GSB\AndroidBundle\Entity\Praticien $praNum
     */
    public function removePraNum(\GSB\AndroidBundle\Entity\Praticien $praNum)
    {
        $this->praNum->removeElement($praNum);
    }

    /**
     * Get praNum
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Add colMatricule
     *
     * @param \GSB\AndroidBundle\Entity\Collaborateur $colMatricule
     * @return ActiviteCompl
     */
    public function addColMatricule(\GSB\AndroidBundle\Entity\Collaborateur $colMatricule)
    {
        $this->colMatricule[] = $colMatricule;

        return $this;
    }

    /**
     * Remove colMatricule
     *
     * @param \GSB\AndroidBundle\Entity\Collaborateur $colMatricule
     */
    public function removeColMatricule(\GSB\AndroidBundle\Entity\Collaborateur $colMatricule)
    {
        $this->colMatricule->removeElement($colMatricule);
    }

    /**
     * Get colMatricule
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColMatricule()
    {
        return $this->colMatricule;
    }
}
