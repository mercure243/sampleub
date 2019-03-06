<?php

namespace Calc\ApiBundle\Services\DomainHandler;

use Calc\ApiBundle\Callback\MainMetricsHandler\Callback\Apinator\Tools\RemoveWWW;
use Calc\ApiBundle\Services\DomainHandler\Info as InfoDomain;
use Calc\ApiBundle\Entity\Domain;

use Doctrine\ORM\EntityManager as Manager;
use Symfony\Component\Validator\Constraints\DateTime;


class AddDomain
{
    /**
     * @var Domain
    */
    private $domain;

    /**
     * @var RemoveWWW
    */
    private $remove;

    /**
     * @var Manager
     */
    private $em;

    /**
     * @var InfoDomain
    */
    private $info;

    /**
     * @var
    */
    private $result, $idna_converted = false;
    
    /**
     * инициализируем переменные
     *
     * @param Manager $em
     * @param InfoDomain $info
     */
    public function __construct(Manager $em, InfoDomain $info)
    {
        $this->em = $em;
        $this->info = $info;
        $this->remove = new RemoveWWW();
    }
    
    /**
     * проверяем полученны данные по доменну или нет
     *
     * @param string $domain
     *
     * @return boolean
     */
    public function isDomain($domain)
    {
        $this->info->setRequest($domain);

        $this->result = $this->info->getResult();

        if (!$this->result) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Получаем домен из базы
     *
     * @param string $domain
     *
     * @return Domain
     */
    public function getDomainEntity($domain)
    {
        $domain = $this->remove->remove($domain);
        $domain = $this->em->getRepository('CalcApiBundle:Domain')
            ->findOneByDomain($domain);

        if ($domain) {
        $this->domain = $domain;
    }

        return $this->domain;
    }

    /**
     * сохраняем домен в базе
     *
     * @return Domain
     */
    public function addDomain()
    {
        $domainName = $this->remove->remove($this->result["domain"]);
        $domain = $this->em->getRepository("CalcApiBundle:Domain")
            ->findOneByDomain($domainName);

        if ($domain) {
            $this->domain = $domain;
            return $domain;
        }

        $this->domain = new Domain();
        $this->domain->setDomain($this->remove->remove($this->result["domain"]));
        $this->domain->setStatusCode($this->result['statusCode']);
        $this->domain->setSizeDownload($this->result['sizeDownload']);
        $this->domain->setTotalTime($this->result['totalTime']);
        $this->domain->setConnectTime($this->result['connectTime']);

        $count = explode(" ", $this->result['description']);
        if (count($count) > 2) {
            $this->domain->setTitle($this->result['title']);
            $this->domain->setDescription($this->result['description']);
        }

        $em = $this->em;
        $em->persist($this->domain);
        $em->flush();

        return $this->domain;
    }
    
    /**
     * Возвращает массив параметров по доменну
     * 
     * @return array Массив параметров по домену
     */
    public function getDomain()
    {
        $result = [
            'id' => $this->domain->getId(),
            'domain' => $this->idnaConvert($this->domain->getDomain(), true),
            'status_code' => $this->domain->getStatusCode(),
            'size_download' => $this->domain->getSizeDownload(),
            'total_time' => $this->domain->getTotalTime(),
            'connect_time' => $this->domain->getConnectTime(),
            'isTop' => $this->domain->getIsTop(),
            'created' => $this->domain->getCreated()->format("Y-m-d"),
        ];

        $data = $this->domain->getMetaUpdate();
        if ($data->getTimestamp() > 0 || $data->diff(new \DateTime())->m <= 1) {
            $result["title"] = $this->domain->getTitle();
            $result["description"] = $this->domain->getDescription();
        }

        return $result;
    }

    /**
     * Проверяет латинский ли домен, иначе конвертирует в punycode
     * и наоборот если задан $inverse = true
     * 
     * @param string $domain
     * @param boolean $inverse
     *
     * @return string
     */
    public function idnaConvert($domain, $inverse = false)
    {
        $idn = new \idna_convert(array('idn_version' => 2008));
        
        if ($inverse && $this->idna_converted) {
            return $idn->decode($domain);
        }
        
        if (preg_match('/^[a-zA-Z\.]+$/', $domain)) {
            return $domain;
        }

        $domain = $idn->encode($domain); 
        $this->idna_converted = true;
        
        return $domain;
    }
}