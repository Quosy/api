<?php

declare(strict_types=1);
/**
 * User: Houziaux mike : jenaye : mike@les-tilleuls.coop.
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
     * @ORM\Column(name="lastname", type="string", length=60)
     */
    private $lastname;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="firstname", type="string", length=60)
     */
    private $firstname;

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
     * @ORM\Column(name="attestation", type="boolean", length=255)
     */
    private $attestation;

    /**
     * @var string
     * @Groups({"Member", "Activity"})
     * @ORM\Column(name="membership", type="string", length=60)
     */
    private $membership;

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

    public function __construct()
    {
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getAttestation(): string
    {
        return $this->attestation;
    }

    /**
     * @param string $attestation
     */
    public function setAttestation(string $attestation): void
    {
        $this->attestation = $attestation;
    }

    /**
     * @return string
     */
    public function getMembership(): string
    {
        return $this->membership;
    }

    /**
     * @param string $membership
     */
    public function setMembership(string $membership): void
    {
        $this->membership = $membership;
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
     * @param string $email
     *
     * @return string
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
