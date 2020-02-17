<?php

namespace DonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity(repositoryClass="DonBundle\Repository\DonRepository")
 */
class Don
{
    /**
     * @var int
     *
     * @ORM\Column(name="idDon", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idDon;

    /**
     * @var float
     *
     * @ORM\Column(name="montantDon", type="float")
     */
    private $montantDon;

    /**
     * @return int
     */
    public function getIdDon()
    {
        return $this->idDon;
    }

    /**
     * @param int $idDon
     */
    public function setIdDon($idDon)
    {
        $this->idDon = $idDon;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDon", type="date")
     */
    private $dateDon;

    /**
     * @ORM\ManyToOne(targetEntity="Demande")
     * @ORM\JoinColumn(name="Demande_idDemande",referencedColumnName="idDemande",onDelete="CASCADE")
     */
    private $Demande;




    /**
     * Set montantDon
     *
     * @param float $montantDon
     *
     * @return Don
     */
    public function setMontantDon($montantDon)
    {
        $this->montantDon = $montantDon;

        return $this;
    }

    /**
     * Get montantDon
     *
     * @return float
     */
    public function getMontantDon()
    {
        return $this->montantDon;
    }

    /**
     * Set dateDon
     *
     * @param \DateTime $dateDon
     *
     * @return Don
     */
    public function setDateDon($dateDon)
    {
        $this->dateDon = $dateDon;

        return $this;
    }

    /**
     * Get dateDon
     *
     * @return \DateTime
     */
    public function getDateDon()
    {
        return $this->dateDon;
    }
}

