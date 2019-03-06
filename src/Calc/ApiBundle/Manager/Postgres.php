<?php

namespace Calc\ApiBundle\Manager;

use Calc\ApiBundle\Manager\Handle\InterfacePostgres;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

class Postgres implements InterfacePostgres
{
    /**
     * @var
    */
    private $conn;

    /**
     * @var array
    */
    private $parameters;

    /**
     * @var resource
     */
    private $result;

    /**
     * Инициалезиврум переменные
    */
    public function __construct()
    {
        $yml = new Parser();

        try {
            $value = $yml->parse(file_get_contents(__DIR__.'/../../../../app/config/parameters.yml'));
            $this->parameters = $value["parameters"];
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
    /**
     * Выполняем конект к базе
     *
     * @return self
     * @throws \Exception Error connect database
     */
    public function connect()
    {
        $this->conn = pg_connect("host={$this->parameters["database_host"]}" .
            " port={$this->parameters["database_port"]}" .
            " dbname={$this->parameters["database_name"]}" .
            " user={$this->parameters["database_user"]}" .
            " password={$this->parameters["database_password"]}" .
            " options='--client_encoding=UTF8'"
        );

        if ($this->conn === false) {
            throw new \Exception("Error connect database");
        }
    }

    /**
     * Начало транзакции
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function transactionStart()
    {
        $query = pg_query($this->conn, "BEGIN");
        if (!$query) {
            $errorMessage = pg_last_error();
            throw new \Exception("Error with query: " . $errorMessage);
        }
    }

    /**
     * Завершение транзакции
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function transactionEnd()
    {
        $query = pg_query($this->conn, "COMMIT");
        if (!$query) {
            $errorMessage = pg_last_error();
            throw new \Exception("Error with query: " . $errorMessage);
        }
    }

     /**
     * Завершение транзакции
     *
     * @return self
     * @throws \Exception Error with query
     */
    public function transactionRollback()
    {
        $query = pg_query($this->conn, "ROLLBACK");
        if (!$query) {
            $errorMessage = pg_last_error();
            throw new \Exception("Error with query: " . $errorMessage);
        }
    }

    /**
     * Обертка для выполнения запросов к базе
     *
     * @param string $sql
     *
     * @return self
     * @throws \Exception Error with query
    */
    public function query($sql)
    {
        $this->result = pg_query($this->conn, $sql);
        if (!$this->result) {
            $errorMessage = pg_last_error();
            throw new \Exception("Error with query: " . $errorMessage);
        }

        return $this;
    }

    /**
     * Возвращаем результат выполнения запроса
     *
     * @return array
     */
    public function getResult()
    {
        $result = [];
        while ($row = pg_fetch_assoc($this->result))
            $result[] = $row;

        return $result;
    }

     /**
     * Возвращаем результат выполнения запроса
     *
     * @return int
     */
    public function getDeleteResult($sql)
    {
        $result = pg_affected_rows($sql);

        return $result;
    }

    /**
     * Закрываем соединение с базой
     *
     * @return self
     */
    public function close()
    {
        pg_close($this->conn);

        return $this;
    }
}