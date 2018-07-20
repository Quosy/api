<?php

declare(strict_types=1);
/**
 * User: Houziaux mike : jenaye : mike@les-tilleuls.coop
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(attributes={"normalization_context"={"groups"={"Member"}},"filters"={"offer.search", "offer.bool"}})
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
{
    /**
     * @var int
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="prenom", type="string", length=60)
     */
    private $prenom;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     * @Groups({"Member"})
     * @ORM\Column(name="cheque", type="boolean")
     */
    private $cheque;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="certificat", type="boolean", length=255)
     */
    private $certificat;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="cotisation", type="string", length=60)
     */
    private $cotisation;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="phone", type="string", length=10)
     */
    private $phone;

    /**
     * @ORM\Column(name="enabled", type="boolean", options={"default":true})
     * @Groups({"Member"})
     */
    protected $enabled;

    /**
     * @ORM\ManyToMany(targetEntity="Activity", inversedBy="members")
     * @Groups({"Member"})
     */
    private $activites;

    /**
     * @var int
     * @ORM\Column(type="integer", length=6)
     * @Groups({"Member"})
     */
    protected $code;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getActivites()
    {
        return $this->activites;
    }

    /**
     * @param mixed $activites
     */
    public function setActivites($activites)
    {
        $this->activites = $activites;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $nom
     *
     * @return Member
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $prenom
     *
     * @return string
     */
    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $email
     *
     * @return string
     */
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param bool $cheque
     *
     * @return bool
     */
    public function setCheque($cheque)
    {
        return $this->cheque = $cheque;
    }

    /**
     * @return bool
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * @param string $certificat
     *
     * @return string
     */
    public function setCertificat($certificat)
    {
        return $this->certificat = $certificat;
    }

    /**
     * @return string
     */
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * @param string $cotisation
     *
     * @return string
     */
    public function setCotisation($cotisation)
    {
        return $this->cotisation = $cotisation;
    }

    /**
     * @return string
     */
    public function getCotisation()
    {
        return $this->cotisation;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function __construct()
    {
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param Activity $activite
     *
     * @return \App\Entity\Activity
     */
    public function addActivite(Activity $activite)
    {
        return $this->activites[] = $activite;
    }

    /**
     * @param Activity $activite
     */
    public function removeActivite(Activity $activite)
    {
        $this->activites->removeElement($activite);
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
}
