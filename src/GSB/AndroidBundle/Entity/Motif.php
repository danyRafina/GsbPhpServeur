<?php

namespace GSB\AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motif
 *
 * @ORM\Table(name="MOTIF")
 * @ORM\Entity
 */
class Motif
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MOT_NUM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $motNum;

    /**
     * @var string
     *
     * @ORM\Column(name="MOT_LABEL", type="string", length=510, nullable=false)
     */
    private $motLabel;



    /**
     * Get motNum
     *
     * @return integer 
     */
    public function getMotNum()
    {
        return $this->motNum;
    }

    /**
     * Set motLabel
     *
     * @param string $motLabel
     * @return Motif
     */
    public function setMotLabel($motLabel)
    {
        $this->motLabel = $motLabel;

        return $this;
    }

    /**
     * Get motLabel
     *
     * @return string 
     */
    public function getMotLabel()
    {
        return $this->motLabel;
    }
}
