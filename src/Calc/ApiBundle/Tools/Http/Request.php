<?php

namespace Calc\ApiBundle\Tools\Http;

class Request
{
    /**
     * @var
    */
    public $curlOptions, $url;

    /**
     * Инициалезируем переменные
     *
     * @param string $url
    */
    public function __construct($url)
    {
        $this->url = $url;
        $this->curlOptions[CURLOPT_URL] = $url;
    }
    
    /**
     * Содержит URL источника запроса
     * 
     * @param string $referer
     *
     * @return boolean
     */
    public function setReferer($referer)
    {
        $this->curlOptions[CURLOPT_REFERER] = $referer;

        return true;
    }

    /**
     * Добавляем опции к курлу
     * 
     * @param string $option
     * @param boolean|int|array $value
     *
     * @return Request
     */
    public function setOption($option, $value)
    {
        $this->curlOptions[$option] = $value;

        return $this;
    }

    /**
     * возвращаем значения option curl
     *
     * @param string $option
     *
     * @return string|null
    */
    public function getOption($option)
    {
        if(isset($this->curlOptions[$option])) {
            return $this->curlOptions[$option];
        }
        
        return null;
    }

    /**
     * Добавляем заголовки user-agent
     *
     * @param string $userAgent
     *
     * @return Request
     */
    public function setUserAgent($userAgent)
    {
        $this->curlOptions[CURLOPT_USERAGENT] = $userAgent;

        return $this;
    }
    
    /**
     * Добаляем заголовки к курлу
     *
     * @param array $header
     *
     * @return boolean
     */
    public function setHeader($header)
    {
        if(is_array($header)) {
            $this->curlOptions[CURLOPT_HTTPHEADER] = $header;

            return true;
        }
        
        return false;
    }
    
    /**
     * Время ожидания ответа
     * 
     * @param int $sec
     *
     * @return Request
     */
    public function setTimeOut($sec)
    {
        $this->curlOptions[CURLOPT_TIMEOUT] = (int) $sec;
        
        return $this;
    }
}