<?php

namespace Dhome\Bundle\AdminBundle\Doctrine\ORM;

use Dhome\Bundle\AdminBundle\Model\InspirationInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class InspirationRepository extends EntityRepository
{
    /**
     * @param $id
     *
     * @return null|InspirationInterface[]
     */
    public function findLatest($id)
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.id != :id')
            ->setParameter('id', $id)
            ->orderBy('o.createdAt', 'DESC')
            ->setMaxResults(3)
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
