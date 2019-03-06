<?php

namespace Calc\ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Calc\ApiBundle\Controller\BaseController as Base;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Calc\ApiBundle\Entity\Domain;
use Calc\ApiBundle\Manager\Postgres;

class MetricsController extends Base
{
    /**
     * @ApiDoc(
     *  description="Выводит информацию по домену",
     *   statusCodes = {
     *     200 = "Успешный ответ",
     *     404 = "Domain or Session id not found",
     *   }
     * )
     * 
     * @param  int $id ID Домена
     * @param  int $uid ID Сессии
     *
     * @Route("/runProcess/{id}/{uid}", name="run_process", defaults={"_format": "json"},
     *     requirements={
     *          "id": "\d+"
     *      })
     *
     * @Method({"GET"})
     * 
     * @Rest\View(serializerGroups={"metrics"})
     * @return array
     */
    public function runProcessAction($id, $uid)
    {        
        $domain = $this->getDomain($id);
        $session = $this->getSession($uid);
        
        if(!$domain || !$session) return $this->notFound('Domain or Session not found');

        $result = $this->get('result');
        return $result->getValueDomain($domain, $session);
    }

    /**
     * @ApiDoc(
     *  description="Добавляет проект в Сайтрепорт",
     *   statusCodes = {
     *     200 = "Успешный ответ",
     *     202 = "Запрос принят для обработки",
     *     404 = "Session not found",
     *     409 = "Проект еще не создан"
     *   }
     * )
     *
     * @param  int $uid ID сессии
     *
     * @Route("/sitereport/{uid}", name="sitereport", defaults={"_format": "json"})
     *
     * @Method({"GET"})
     *
     * @Rest\View(serializerGroups={"sitereport"})
     * @return object
     */
    public function sitereportAction($uid)
    {
        $session = $this->getSession($uid);
        if(!$session) return $this->notFound('Session not found');

        $domain = $session->getDomain();
        if(!$session->getDomain()->getSitereportProjectId())
            return $this->error('Ошибка: отсутствует ID проекта Sitereport', 202);

        return $domain;
    }
}
