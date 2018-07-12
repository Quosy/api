<?php
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : mike@les-tilleuls.coop
 * Date: 12/07/18
 * Time: 20:21
 */

namespace App\Entity;

use App\Entity\Member;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Activity
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add membre
     *
     * @param Member $member
     * @return Activity
     * @internal param Membre $membre
     *
     */
    public function addMembre(Member $member)
    {
        $this->members[] = $member;

        return $this;
    }

    /**
     * Remove membre
     *
     * @param Member $member
     * @internal param Membre $membre
     */
    public function removeMembre(Member $member)
    {
        $this->members->removeElement($member);
    }

    /**
     * Get membres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembres()
    {
        return $this->members;
    }

}