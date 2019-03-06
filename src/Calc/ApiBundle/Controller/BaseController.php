<?php
namespace Calc\ApiBundle\Controller;

use Calc\ApiBundle\Entity\Domain;
use Calc\ApiBundle\Entity\SessionId;
use FOS\RestBundle\Controller\FOSRestController;

class BaseController extends FOSRestController
{
    /**
     * Возвращает объект домена
     *
     * @param int $id
     *
     * @return Domain
     */
    protected function getDomain($id)
    {
        return $this->getDoctrine()->getRepository('CalcApiBundle:Domain')
            ->findOneBy(['id' => $id]);
    }
    
    /**
     * Возвращаем объект сессии
     *
     * @param string $uid
     *
     * @return SessionId
     */
    protected function getSession($uid)
    {
        return $this->getDoctrine()->getRepository('CalcApiBundle:SessionId')
                ->findOneBy(['uniqId' => $uid]);
    }
    
    protected function notFound($message)
    {
        return $this->error($message, 404);
    }
    
    protected function error($message, $code)
    {
        $data['error']['code'] = $code;
        $data['error']['message'] = $message;
        
        $view = $this->view($data, $code);
        return $this->handleView($view);
    }
}