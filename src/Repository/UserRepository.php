<?php

declare(strict_types=1);
/**
 * User: Houziaux mike : jenaye : mike@les-tilleuls.coop.
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findByEmail($email)
    {
        $queryBuilder = $this->createQueryBuilder('m');

        return $queryBuilder
            ->where("m.email = '$email'")
            ->getQuery()->getResult();
    }
}
