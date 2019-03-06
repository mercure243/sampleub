<?php

namespace Calc\ApiBundle\Manager\Handle;


interface InterfacePostgres
{
    /**
     * Выполняем конект к базе
     *
     * @return self
     * @throws \Exception Error connect database
    */
    public function connect();

    /**
     * Начало транзакции
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function transactionStart();

    /**
     * Завершение транзакции
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function transactionEnd();

    /**
     * Обертка для выполнения запросов к базе
     *
     * @param string $sql
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function query($sql);

    /**
     * Возвращаем результат выполнения запроса
     *
     * @return array
     */
    public function getResult();
}