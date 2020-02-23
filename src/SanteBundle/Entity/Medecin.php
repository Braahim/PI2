<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medecin
 *
 * @ORM\Table(name="medecin")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\MedecinRepository")
 */
class Medecin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nCIN", type="integer")
     */
    private $nCIN;

    /**
     * @var string
     *
     * @ORM\Column(name="nonMedecin", type="string", length=255)
     */
    private $nonMedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMedecin", type="string", length=255)
     */
    private $prenomMedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string")
     */
    private $telephone;

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param mixed $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     *@ORM\ManyToOne(targetEntity="SanteBundle\Entity\Specialite")
     *
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="specialite",referencedColumnName="id",onDelete="CASCADE")
     * })
     */

    private $specialite;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nCIN
     *
     * @param integer $nCIN
     *
     * @return Medecin
     */
    public function setNCIN($nCIN)
    {
        $this->nCIN = $nCIN;

        return $this;
    }

    /**
     * Get nCIN
     *
     * @return int
     */
    public function getNCIN()
    {
        return $this->nCIN;
    }

    /**
     * Set nonMedecin
     *
     * @param string $nonMedecin
     *
     * @return Medecin
     */
    public function setNonMedecin($nonMedecin)
    {
        $this->nonMedecin = $nonMedecin;

        return $this;
    }

    /**
     * Get nonMedecin
     *
     * @return string
     */
    public function getNonMedecin()
    {
        return $this->nonMedecin;
    }

    /**
     * Set prenomMedecin
     *
     * @param string $prenomMedecin
     *
     * @return Medecin
     */
    public function setPrenomMedecin($prenomMedecin)
    {
        $this->prenomMedecin = $prenomMedecin;

        return $this;
    }

    /**
     * Get prenomMedecin
     *
     * @return string
     */
    public function getPrenomMedecin()
    {
        return $this->prenomMedecin;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Medecin
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

}


