<?php

namespace Calc\ApiBundle\Services\DomainHandler;

use Calc\ApiBundle\Entity\Domain;
use Calc\ApiBundle\Entity\SessionId;

use Doctrine\ORM\EntityManager as Manager;

class Session
{
    /**
     * @var
     */
    private $em;
    
    /**
     * инициализируем переменные
     *
     * @param Manager $em
     */
    public function __construct(Manager $em)
    {
        $this->em = $em;
    }
    
    /**
     * Возвращаем параметры сессии
     *
     * @param Domain $domain
     * @param string $uid
     *
     * @return object Session
     */
    public function getSessionValue(Domain $domain, $uid)
    {
        $session = $this->isUniqId($uid);
        
        if (is_null($session)) {
            return $this->addSession($domain);
        } else {
            return $this->getSession($session);
        }
    }

    /**
     * Возвращаем объект сессии
     *
     * @param Domain $domain
     *
     * @return SessionId
    */
    public function getSessionEntity($domain)
    {
        $uid = substr(uniqid(), -5);
        $isUid = $this->isUniqId($uid);

        if (!$isUid) {
            return $this->createSession($domain, $uid);
        } else {
            return $this->getSessionEntity($domain);
        }
    }
    
    /**
     * сохраняем сессию для доменна в базу
     *
     * @param Domain $domain
     *
     * @return array Значения новой сессии
     */
    private function addSession(Domain $domain)
    {
        $uid = substr(uniqid(), -5);
        $isUid = $this->isUniqId($uid);

        if (!$isUid) {
            $session = $this->createSession($domain, $uid);

            return [
                'flag' => '0',
                'uniq_id' => $session->getUniqId(),
                'contact' => false,
                'date' => $session->getCreatedAt()->Format('Y-m-d H:i'),
            ];
        } else {
            return $this->addSession($domain);
        }
    }

    /**
     * Создаем объект сессии
     *
     * @param Domain $domain
     * @param string $uid
     *
     * @return SessionId
    */
    private function createSession(Domain $domain, $uid)
    {
        $session = new SessionId();
        $session->setUniqId($uid);
        $session->setDomain($domain);
        $ips = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = $ips[0];
        $session->setIp($ip);

        $em = $this->em;
        $em->persist($session);
        $em->flush();

        return $session;
    }

    /**
     * Проверяем uniq_id на существование
     *
     * @param string $data
     *
     * @return SessionId
    */
    private function isUniqId($data)
    {
        return $this->em->getRepository('CalcApiBundle:SessionId')
            ->findOneBy(['uniqId' => $data]);
    }

    /**
     * Получаем данные из сессии
     *
     * @param SessionId $session
     *
     * @return array Значения старой сессии
     */
    private function getSession($session)
    {
        $email = $session->getEMails();
        $phone = $session->getPhones();
        $manager = $session->getManager();
        $contract = $session->getContract();

        return [
            'flag' => '1',
            'uniq_id' => $session->getUniqId(),
            'contact' => [
                'email' => $email ? $email->getMail() : '',
                'phone' => $phone ? $phone->getNumber() : '',
                'manager' => $manager ? $manager->getId() : '',
                'contract' => $contract ? true : false,
            ],
            'date' => $session->getCreatedAt()->format('Y-m-d H:i'),
            'ip' => $session->getIp(),
        ];
    }
}
