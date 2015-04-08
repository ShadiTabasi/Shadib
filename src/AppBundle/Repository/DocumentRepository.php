<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class DocumentRepository extends EntityRepository
{

    /**
     * Returns the authors having the most documents
     * This does not returns hydrated object but an array containing :
     *  - The number of documents for an author
     *  - The author data
     *  - The data of the latest document created by the author
     *
     * @param int $number Limits the number of authors returned
     *
     * @return array
     *
     */
    public function findTopAuthors($number)
    {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('COUNT(latest_document) as document_count, author, latest_document')
            ->from('AppBundle:Document', 'latest_document')
            ->leftJoin('latest_document.author', 'author')
            ->orderBy('latest_document.created', 'desc')
            ->groupBy('author.id')
            ->orderBy('document_count', 'desc')
            ->getMaxResults($number);
        $result = $queryBuilder->getQuery()->getScalarResult();

        return $result;

    }

}
