<?php

namespace Calc\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

use Calc\ApiBundle\Entity\Domain;

class DomainRepository extends EntityRepository
{
    /**
     * Получаем домен у которых есть метрики
     *
     * @return object
     */
    public function findByMetrics()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT d FROM CalcApiBundle:Domain d
                WHERE 
                  d.alexaUpdate != '1970-01-01'
                  AND d.yaBarUpdate != '1970-01-01'
                  AND d.dmozUpdate != '1970-01-01'
                  AND d.mailruCatUpdate != '1970-01-01'
                  AND d.ramblerCatUpdate != '1970-01-01'
                  AND d.yaIndexAndVirusUpdate != '1970-01-01'
                  AND d.gIndexUpdate != '1970-01-01'
                  AND d.gExtraIndexUpdate != '1970-01-01'
                  AND d.gMentionUpdate != '1970-01-01'
                  AND d.firstCrawlDateUpdate != '1970-01-01'
                  AND d.yaBlogUpdate != '1970-01-01'
                  AND d.yaLastUpdate != '1970-01-01'
                  AND d.yaMentionUpdate != '1970-01-01'
                  AND d.IntoAndExternalUpdate != '1970-01-01'
                  AND d.historySolomonoLinksUpdate != '1970-01-01'
                  AND d.fbLikeUpdate != '1970-01-01'
                  AND d.gpLikeUpdate != '1970-01-01'
                  AND d.twLikeUpdate != '1970-01-01'
                  AND d.vkLikeUpdate != '1970-01-01'
            ");

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Получаем список доменов у котрых нет id проекта
     *
     * @param int $max
     *
     * @return array
    */
    public function findByIsNotProjectId($max)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT d FROM CalcApiBundle:Domain d
                WHERE d.sitereportProjectId = \'0\' AND d.notProjectId = \'0\'
                ORDER BY d.yaTic DESC
            ')
            ->setFirstResult(0)
            ->setMaxResults($max);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Список доменов без для удаления www
     *
     * @param array $data
     *
     * @return array
     */
    public function findByInDomain(array $data)
    {
        $expr = $this->_em->createQueryBuilder()->expr();

        $query = $this->_em->createQueryBuilder()
            ->select('d')
            ->from('CalcApiBundle:Domain', 'd')
            ->where(
                $expr->in('d.domain', $data)
            )
            ->getQuery();

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Список доменов без для удаления www
     *
     * @param string $data
     *
     */
    public function findByDomainName($data)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT d.id, d.domain FROM CalcApiBundle:Domain d
                WHERE d.domain LIKE :data
            ')->setParameter(':data', $data);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Список доменов без для удаления www
     *
     * @param int $id
     *
     */
    public function deleteByDomainId($id)
    {
    try {
        $query = $this->getEntityManager()
            ->createQuery('
               DELETE FROM CalcApiBundle:Domain d WHERE d.id = :id
            ')->setParameter(':id', $id);



        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Список доменов у которых нужно скинуть
     * метку времени генерации лида
     *
     * @return array
     */
    public function findByOldCreateLead()
    {
        $date = new \DateTime();
        $date->modify('-30 day');
        $date = $date->format('Y-m-d');

        $query = $this->getEntityManager()
            ->createQuery('
                SELECT d FROM CalcApiBundle:Domain d
                WHERE 
                  d.createLead < :date_old
                  AND d.createLead <> \'1970-01-01\'
            ')
            ->setParameter('date_old', $date);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}