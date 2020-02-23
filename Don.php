<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;


/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\DonRepository")
 */
class Don
{
    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $reference;

    /**
     * @return int
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param int $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     *
     *
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     *
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\LessThan("today",message="date inferieur date systeme")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(name="Stock_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $Stock;

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->Stock;
    }

    /**
     * @param mixed $Stock
     */
    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }


    /**
     * Get id
     *
     * @return int
     */


    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Don
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Don
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Don
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
}

