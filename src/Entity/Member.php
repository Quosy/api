<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : mike@les-tilleuls.coop
 * Date: 12/07/18
 * Time: 20:14.
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Membre.
 *
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
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
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return string
     */
    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return string
     */
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cheque.
     *
     * @param bool $cheque
     *
     * @return bool
     */
    public function setCheque($cheque)
    {
        return $this->cheque = $cheque;
    }

    /**
     * Get cheque.
     *
     * @return bool
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Set certificat.
     *
     * @param string $certificat
     *
     * @return string
     */
    public function setCertificat($certificat)
    {
        return $this->certificat = $certificat;
    }

    /**
     * Get certificat.
     *
     * @return string
     */
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * Set cotisation.
     *
     * @param string $cotisation
     *
     * @return string
     */
    public function setCotisation($cotisation)
    {
        return $this->cotisation = $cotisation;
    }

    /**
     * Get cotisation.
     *
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

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add activite.
     *
     * @param Activity $activite
     *
     * @return \App\Entity\Activity
     */
    public function addActivite(Activity $activite)
    {
        return $this->activites[] = $activite;
    }

    /**
     * Remove activite.
     *
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
