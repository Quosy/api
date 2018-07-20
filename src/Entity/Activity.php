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
 * @ApiResource(attributes={"normalization_context"={"groups"={"Activity"}}})
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @var int
     * @Groups({"Activity", "Member"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, unique=true)
     * @Groups({"Activity", "Member"})
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Member", mappedBy="activites")
     * @Groups({"Activity"})
     */
    private $members;

    /**
     * @ORM\ManyToOne(targetEntity="Type", inversedBy="acti")
     * @Groups({"Activity"})
     */
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return Activity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param Member $member
     *
     * @return Activity
     */
    public function addMembre(Member $member)
    {
        $this->members[] = $member;

        return $this;
    }

    /**
     * @param Member $member
     */
    public function removeMembre(Member $member)
    {
        $this->members->removeElement($member);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembres()
    {
        return $this->members;
    }
}
