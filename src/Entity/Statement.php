<?php

declare(strict_types=1);
/**
 * User: Houziaux mike : jenaye : mike@les-tilleuls.coop.
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Table(name="statement")
 * @ORM\Entity(repositoryClass="App\Repository\StatementRepository")
 */
class Statement
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=60)
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="inflow", type="integer", nullable=true)
     */
    private $inflow;

    /**
     * @var int
     *
     * @ORM\Column(name="outflow", type="integer", nullable=true)
     */
    private $outflow;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return int
     */
    public function getInflow(): int
    {
        return $this->inflow;
    }

    /**
     * @param int $inflow
     */
    public function setInflow(int $inflow): void
    {
        $this->inflow = $inflow;
    }

    /**
     * @return int
     */
    public function getOutflow(): int
    {
        return $this->outflow;
    }

    /**
     * @param int $outflow
     */
    public function setOutflow(int $outflow): void
    {
        $this->outflow = $outflow;
    }

    public function __toString()
    {
        return $this->designation;
    }
}
