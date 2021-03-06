<?php

namespace Calc\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SessionIdRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SessionIdRepository extends EntityRepository
{
    public function findBySessionCompetitors($id)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT sc FROM CalcApiBundle:SessionCompetitors sc
                LEFT JOIN sc.sessionId s
                LEFT JOIN s.domain d
                WHERE s.id = :id AND sc.flag <> false
            ')->setParameter('id', $id);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Старые сессии, которые можно удалить
    */
    public function findByOldSession()
    {
        $date = new \DateTime();
        $date->modify('-12 month');
        $date = $date->format("Y-m-d");

        $query = $this->getEntityManager()
            ->createQuery('
                SELECT s FROM CalcApiBundle:SessionId s
                WHERE s.createdAt <= :date
            ')
            ->setParameter('date', $date);
        
        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Получаем список все удитов за определенный период
     *
     * @param int $position
     *
     * @return array
    */
    public function findByDate($position)
    {            
            $query = $this->getEntityManager()
            ->createQuery("
                SELECT s, s.uniqId, d.isCreateExcel, s.bitrixLeadId FROM CalcApiBundle:SessionId s
                LEFT JOIN CalcApiBundle:Domain d
                WHERE s.domain = d
                AND s.isTest = false
                ORDER BY s.createdAt DESC
            ")
            ->setFirstResult($position)
            ->setMaxResults(1000);
            

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Получаем список все удитов за определенный период
     *
     * @param int $position
     *
     * @return array
    */
    public function findByDateTest($position)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT s, s.uniqId, d.isCreateExcel, s.bitrixLeadId FROM CalcApiBundle:SessionId s
                LEFT JOIN CalcApiBundle:Domain d
                WHERE s.domain = d
                AND s.isTest = false
                ORDER BY s.createdAt DESC
            ")
            ->setFirstResult($position)
            ->setMaxResults(10);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Получаем список все удитов за определенный период
     *
     *
     * @return array
    */
    public function findCountSession($domain)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT count(s) FROM CalcApiBundle:SessionId s
                WHERE s.domain=:domain
            ")->setParameter('domain', $domain);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    /**
     * Получаем список все удитов по которым еще готовится отчет
     *
     * @return array
     */
    public function findByAuditProcessing()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT s, d, e, p FROM CalcApiBundle:SessionId s
                LEFT JOIN s.domain d
                LEFT JOIN s.eMails e
                LEFT JOIN s.phones p
                WHERE 
                  s.isTest = false 
                  AND s.eMails IS NOT NULL
                  AND s.isEmail = 't'
                  AND s.isSendMailSitereport = 'f'
                ORDER BY s.createdAt DESC
            ");

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

     /**
     * Получаем список все удитов по которым еще готовится отчет
     *
     * @return array
     */
    public function findByBitrixLead($domain)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT s, d, e, p FROM CalcApiBundle:SessionId s
                LEFT JOIN s.domain d
                LEFT JOIN s.eMails e
                LEFT JOIN s.phones p
                WHERE 
                  s.isTest = false 
                  AND s.bitrixLeadId IS NOT NULL
                  AND s.domain=:domain
                ORDER BY s.bitrixLeadId ASC
            ")->setParameter('domain', $domain);

        try {
            return $query->getResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}