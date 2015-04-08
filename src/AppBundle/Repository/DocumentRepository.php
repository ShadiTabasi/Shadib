<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DocumentRepository extends EntityRepository
{

    public function findTopAuthors($number)
    {
        $queryBuilder = $this
            ->createQueryBuilder('document');
        $queryBuilder
            ->leftJoin('document.author', 'person')
            ->leftJoin('AppBundle:Document', 'publications', 'WITH', 'publications.author = person.id')
            ->groupBy('document.id')
            ->getMaxResults($number);

        return $queryBuilder->getQuery()->getResult();


    }

}
