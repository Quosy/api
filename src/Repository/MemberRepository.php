<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : mike@les-tilleuls.coop
 * Date: 12/07/18
 * Time: 20:16.
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MembreRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MemberRepository extends EntityRepository
{
    public function findByEmail($email)
    {
        $queryBuilder = $this->createQueryBuilder('m');

        return $queryBuilder
            ->where("m.email = '$email'")
            ->getQuery()->getResult();
    }
}
