<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeIndividu
 *
 * @ORM\Table(name="TYPE_INDIVIDU")
 * @ORM\Entity
 */
class TypeIndividu
{
    /**
     * @var string
     *
     * @ORM\Column(name="TIN_CODE", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tinCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="TIN_LIBELLE", type="string", length=100, nullable=true)
     */
    private $tinLibelle;



    /**
     * Get tinCode
     *
     * @return string 
     */
    public function getTinCode()
    {
        return $this->tinCode;
    }

    /**
     * Set tinLibelle
     *
     * @param string $tinLibelle
     * @return TypeIndividu
     */
    public function setTinLibelle($tinLibelle)
    {
        $this->tinLibelle = $tinLibelle;

        return $this;
    }

    /**
     * Get tinLibelle
     *
     * @return string 
     */
    public function getTinLibelle()
    {
        return $this->tinLibelle;
    }
}
