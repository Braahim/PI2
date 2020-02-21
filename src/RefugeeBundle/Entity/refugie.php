<?php

namespace RefugeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * refugie
 *
 * @ORM\Table(name="refugie")
 * @ORM\Entity(repositoryClass="RefugeeBundle\Repository\refugieRepository")
 */
class refugie
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255)
     */
    private $nationality;

    /**
     * refugie constructor.
     */
    public function __construct()
    {
        $this->setCurrentDate(new \DateTime("now"));
    }

    /**
     * @return mixed
     */
    public function getCamp()
    {
        return $this->camp;
    }

    /**
     * @param mixed $camp
     */
    public function setCamp($camp)
    {
        $this->camp = $camp;
    }

    /**
     * @ORM\ManyToOne(targetEntity="camp")
     * @ORM\JoinColumn(name="camp", referencedColumnName="id",onDelete="CASCADE")
     */
    private $camp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthD", type="date")
     */
    private $birthD;

    /**
     * @var string
     *
     * @ORM\Column(name="birthLoc", type="string", length=255)
     */
    private $birthLoc;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="socialSit", type="string", length=255)
     */
    private $socialSit;

    /**
     * @var string
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png" , "image/tiff" , "image/svg+xml"})
     * @Assert\NotBlank(message="plz enter an image")
     * @Assert\Image()
     * @ORM\Column(name="img",type="string",length=255,nullable=true)
     */
    private $img;


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
     * @return \DateTime
     */
    public function getCurrentDate()
    {
        return $this->currentDate;
    }

    /**
     * @param \DateTime $currentDate
     */
    public function setCurrentDate($currentDate)
    {
        $this->currentDate = $currentDate;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $currentDate;

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return refugie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return refugie
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return refugie
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set birthD
     *
     * @param \DateTime $birthD
     *
     * @return refugie
     */
    public function setBirthD($birthD)
    {
        $this->birthD = $birthD;

        return $this;
    }


    /**
     * Get birthD
     *
     * @return \DateTime
     */
    public function getBirthD()
    {
        return $this->birthD;
    }

    /**
     * Set birthLoc
     *
     * @param string $birthLoc
     *
     * @return refugie
     */
    public function setBirthLoc($birthLoc)
    {
        $this->birthLoc = $birthLoc;

        return $this;
    }

    /**
     * Get birthLoc
     *
     * @return string
     */
    public function getBirthLoc()
    {
        return $this->birthLoc;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return refugie
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set socialSit
     *
     * @param string $socialSit
     *
     * @return refugie
     */
    public function setSocialSit($socialSit)
    {
        $this->socialSit = $socialSit;

        return $this;
    }

    /**
     * Get socialSit
     *
     * @return string
     */
    public function getSocialSit()
    {
        return $this->socialSit;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return refugie
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }



}

