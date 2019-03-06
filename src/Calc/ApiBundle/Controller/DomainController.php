<?php

namespace Calc\ApiBundle\Controller;

use Calc\ApiBundle\Controller\BaseController as Base;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DomainController extends Base
{
    /**
     * @ApiDoc(
     *  description="Проверяем корректность ввода домена",
     *  statusCodes = {
     *     200 = "Успешный ответ",
     *     404 = "Domain is not exist",
     *     434 = "I can not get information about the domain or the  domain is not available"
     *   }
     * )
     *
     * @param string $domain Домен сайта
     *
     * @Route("/isDomain/{domain}", name="is_domain", defaults={"_format": "json"})
     * @Method({"GET"})
     *
     * @Rest\View()
     * @return array
     */
    public function isDomainAction($domain)
    {
        $addDomain = $this->get("add_domain");
        $domain = $addDomain->idnaConvert($domain, true);
        if(gethostbyname($domain) == $domain) {
            return $this->notFound('Domain is not exist');
        }

        $domainEntity = $addDomain->getDomainEntity($domain);
        if(is_null($domainEntity)) {
            if($addDomain->isDomain($domain)) {
                return $this->error('I can not get information about the domain or the  domain is not available', 434);
            }

            $addDomain->addDomain();
        }

        $domain = $addDomain->getDomain();
        
        return [$domain['domain']];
    }

    /**
     * @ApiDoc(
     *  description="Возвращает информацию по домену, session id, флаг(есть ли у домена сессия), бейдж за быструю загрузку домена",
     *  statusCodes = {
     *     200 = "Успешный ответ",
     *     404 = "Domain is not exist",
     *     434 = "I can not get information about the domain or the  domain is not available"
     *   }
     * )
     * 
     * @param string $domain Домен сайта
     * @param string $uid id сессии
     *
     * @Route("/domain/{domain}/{uid}", name="domain", defaults={"_format": "json", "uid": null})
     * @Method({"GET"})
     * 
     * @Rest\View()
     * @return array
     */
    public function infoAction($domain, $uid)
    {

        $domain = mb_strtolower($domain, "utf-8");     
        $addDomain = $this->get("add_domain");

        $domain = $addDomain->idnaConvert($domain, true);
        if(gethostbyname($domain) == $domain)
            return $this->notFound('Domain is not exist');

        $domainEntity = $addDomain->getDomainEntity($domain);
        if(is_null($domainEntity)) {
            if($addDomain->isDomain($domain))
                return $this->error('I can not get information about the domain or the  domain is not available', 434);

            $domainEntity = $addDomain->addDomain();
        }

        $addSession = $this->get("add_session");
        $value = $addSession->getSessionValue($domainEntity, $uid);


        $domainInfo = $addDomain->getDomain();

        return [
            'domainEntity' => $domainInfo,
            'session' => $value,
        ];
    }

    /**
     * @ApiDoc(
     *  description="Возвращаем всех менеджеров",
     *   statusCodes = {
     *     200 = "Успешный ответ",
     *   }
     * )
     *
     * @Route("/allManager", name="all_manager", defaults={"_format": "json"})
     * @Method({"GET"})
     *
     * @Rest\View()
     */
    public function managersAction()
    {
        return  $this->getDoctrine()->getRepository('CalcApiBundle:Manager')
            ->findAll();
    }
   
    /**
     * @ApiDoc(
     *  description="Отправляем смс если не пришел ана",
     *   statusCodes = {
     *     200 = "Успешный ответ",
     *   }
     * )
     *
     * @param string $uid
     *
     * @Route("/sendSMS/{uid}", name="send_sms", defaults={"_format": "json"})
     * @Method({"GET"})
     *
     * @Rest\View()
     * @return string
     */
    public function smsAction($uid)
    {
        $session = $this->getSession($uid);

        $sms = $this->get("send_sms");
        $sms->setParameters(
            [79032356994, 79857767557],
            "Не пришел отчет от сайт репорта, или нет расчета цены!-idSession:" . $session->getUniqId() .
            " Domain: " . $session->getDomain()->getDomain()
        );
        $sms->run();
        
        return 'successful';
    }
}