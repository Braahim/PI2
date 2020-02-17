<?php

namespace DonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="DonBundle\Repository\DemandeRepository")
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idDemande", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="titreDem", type="string", length=255)
     */
    private $titreDem;

    /**
     * @var string
     *
     * @ORM\Column(name="descDem", type="text")
     */
    private $descDem;

    /**
     * @var float
     *
     * @ORM\Column(name="montantDem", type="float")
     */
    private $montantDem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delaiFinal", type="date")
     */
    private $delaiFinal;




    /**
     * Set titreDem
     *
     * @param string $titreDem
     *
     * @return Demande
     */
    public function setTitreDem($titreDem)
    {
        $this->titreDem = $titreDem;

        return $this;
    }

    /**
     * Get titreDem
     *
     * @return string
     */
    public function getTitreDem()
    {
        return $this->titreDem;
    }

    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * Set descDem
     *
     * @param string $descDem
     *
     * @return Demande
     */
    public function setDescDem($descDem)
    {
        $this->descDem = $descDem;

        return $this;
    }

    /**
     * Get descDem
     *
     * @return string
     */
    public function getDescDem()
    {
        return $this->descDem;
    }

    /**
     * Set montantDem
     *
     * @param float $montantDem
     *
     * @return Demande
     */
    public function setMontantDem($montantDem)
    {
        $this->montantDem = $montantDem;

        return $this;
    }

    /**
     * Get montantDem
     *
     * @return float
     */
    public function getMontantDem()
    {
        return $this->montantDem;
    }

    /**
     * Set delaiFinal
     *
     * @param \DateTime $delaiFinal
     *
     * @return Demande
     */
    public function setDelaiFinal($delaiFinal)
    {
        $this->delaiFinal = $delaiFinal;

        return $this;
    }

    /**
     * Get delaiFinal
     *
     * @return \DateTime
     */
    public function getDelaiFinal()
    {
        return $this->delaiFinal;
    }
}

