<?php

namespace volunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="volunteerBundle\Repository\evenementRepository")
 */
class evenement
{
    /**
     * @var ref
     *
     * @ORM\Column(name="ref", type="integer")
     * @ORM\Id

     */
    private $ref;

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return ref
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param ref $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @ORM\ManyToOne(targetEntity="categorie")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     *
     * @Assert\Regex(pattern="/[A-Za-z]$/", message="saisie une chaine de charactere")
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\GreaterThan("today",message="saisie une date valide")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     * @Assert\Regex(pattern="/[A-Za-z]$/", message="saisie une chaine de charactere")
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrPart", type="integer")
     */
    private $nbrPart;

    /**
     * @return ref
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param ref $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return evenement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return evenement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set nbrPart
     *
     * @param integer $nbrPart
     *
     * @return evenement
     */
    public function setNbrPart($nbrPart)
    {
        $this->nbrPart = $nbrPart;

        return $this;
    }

    /**
     * Get nbrPart
     *
     * @return int
     */
    public function getNbrPart()
    {
        return $this->nbrPart;
    }



}

