<?php

namespace DonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="DonBundle\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPaiement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCompte", type="string", length=255)
     */
    private $nomCompte;

    /**
     * @return int
     */
    public function getIdPaiement()
    {
        return $this->idPaiement;
    }

    /**
     * @param int $idPaiement
     */
    public function setIdPaiement($idPaiement)
    {
        $this->idPaiement = $idPaiement;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="prenomCompte", type="string", length=255)
     */
    private $prenomCompte;

    /**
     * @var int
     *
     * @ORM\Column(name="RIB", type="integer")
     */
    private $rIB;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordCompte", type="string", length=255)
     */
    private $passwordCompte;



    /**
     * Set nomCompte
     *
     * @param string $nomCompte
     *
     * @return Paiement
     */
    public function setNomCompte($nomCompte)
    {
        $this->nomCompte = $nomCompte;

        return $this;
    }

    /**
     * Get nomCompte
     *
     * @return string
     */
    public function getNomCompte()
    {
        return $this->nomCompte;
    }

    /**
     * Set prenomCompte
     *
     * @param string $prenomCompte
     *
     * @return Paiement
     */
    public function setPrenomCompte($prenomCompte)
    {
        $this->prenomCompte = $prenomCompte;

        return $this;
    }

    /**
     * Get prenomCompte
     *
     * @return string
     */
    public function getPrenomCompte()
    {
        return $this->prenomCompte;
    }

    /**
     * Set rIB
     *
     * @param integer $rIB
     *
     * @return Paiement
     */
    public function setRIB($rIB)
    {
        $this->rIB = $rIB;

        return $this;
    }

    /**
     * Get rIB
     *
     * @return int
     */
    public function getRIB()
    {
        return $this->rIB;
    }

    /**
     * Set passwordCompte
     *
     * @param string $passwordCompte
     *
     * @return Paiement
     */
    public function setPasswordCompte($passwordCompte)
    {
        $this->passwordCompte = $passwordCompte;

        return $this;
    }

    /**
     * Get passwordCompte
     *
     * @return string
     */
    public function getPasswordCompte()
    {
        return $this->passwordCompte;
    }
}

