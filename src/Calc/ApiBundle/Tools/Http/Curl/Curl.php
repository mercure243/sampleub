<?php

namespace Calc\ApiBundle\Tools\Http\Curl;

use Calc\ApiBundle\Tools\Http\Request;

class Curl
{
    /**
     * @var array
     */
    public $headers;

    /**
     * @var array
    */
    public $userAgent;

    /**
     * @var array
    */
    private $curlOptions;

    /**
     * @var array
    */
    private $callback;

    /**
     * @var array
    */
    private $requests;

    /**
     * инициализируем переменные
     */
    public function __construct()
    {        
        $this->curlOptions = [
            CURLOPT_AUTOREFERER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 0,
        ];
    }
    
    /**
     * добовляем параметры к curlOption
     * 
     * @param string $option название свойства курла
     * @param string $value значение свойства
     */
    public function setOption($option, $value)
    {
        $this->curlOptions[$option] = $value;
    }
    
    /**
     * подстовляем данные в header
     * 
     * @param array $header
     *
     * @return self
     */
    public function setHeader($header)
    {
        if(is_array($header) AND count($header)) {
            $this->curlOptions[CURLOPT_HTTPHEADER] = $header;
        }
        
        return $this;
    }
    
    /**
     * Возвращает данные в вызвовший объект
     * 
     * @param string $callback название метода
     *
     * @return self
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;

        return $this;
    }
    
    /**
     * Полчает объект рекуест для запроса через курл
     * 
     * @param Request $request объект Request
     *
     * @return self
     */
    public function setRequest(Request $request)
    {
        if(!isset($request->curlOptions[CURLOPT_URL]) || $request->curlOptions[CURLOPT_URL] == '') return $this;
        
        $request->curlOptions = $request->curlOptions + $this->curlOptions;
        $this->requests = $request->curlOptions;

        return $this;
    }

    /**
     * делаем запрос курлом
     *
     * @return boolean|array массив значений
     */
    public function run()
    {
        if ($this->callback && (!count($this->requests) || !is_callable($this->callback))) return false;

        $ch = curl_init();
        curl_setopt_array($ch, $this->requests);
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        if ($this->callback) {
            call_user_func($this->callback, $response, $info, $this->requests);
        }

        if($response != '') {
            return [
                'result' => $response,
                'info' => $info,
                'request' => $this->requests
            ];
        } else {
            return false;
        }
    }
}