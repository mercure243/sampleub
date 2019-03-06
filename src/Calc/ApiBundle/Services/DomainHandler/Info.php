<?php

namespace Calc\ApiBundle\Services\DomainHandler;

use Calc\ApiBundle\Tools\Http\Request;
use Calc\ApiBundle\Tools\Http\Curl\Curl;
use Calc\ApiBundle\Services\DomainHandler\Tools\Options;

class Info
{
    /**
     * @var
     */
    private $curl;
    
    /**
     * инициализируем переменные
     */
    public function __construct() {
        $header = [
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
            'Accept-Charset: utf-8,windows-1251;q=0.7,*;q=0.7',
            'Keep-Alive: 300',   
        ];
        
        $this->curl = new Curl();
        $this->curl->setOption(CURLOPT_HEADER, 0);
        $this->curl->setOption(CURLOPT_HTTPHEADER, $header);
        $this->curl->setOption(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0');
        $this->curl->setOption(CURLOPT_ENCODING, 'gzip,deflate');
        $this->curl->setOption(CURLOPT_TIMEOUT, 25);
        $this->curl->setOption(CURLOPT_CONNECTTIMEOUT, 25);
        $this->curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $this->curl->setOption(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
    }
    
    /**
     * Подставляем домен для снития по нему первичной информации
     *
     * @param string $domain
     */
    public function setRequest($domain)
    {
        $this->curl->setRequest(new Request('http://' . trim($domain)));
    }

    
    /**
     * возвращает значение по домену
     *
     * @return mixed
     */
    public function getResult()
    {
        $res = $this->curl->run();

        if (empty($res)) return false;

        $options = new Options();
        $options
            ->setInfo($res['info'])
            ->setHtml($res['result']);

        return $options->getResult();
    }
}
