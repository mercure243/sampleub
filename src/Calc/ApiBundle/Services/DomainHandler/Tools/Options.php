<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Calc\ApiBundle\Services\DomainHandler\Tools;

use Symfony\Component\DomCrawler\Crawler;

class Options
{
    /**
     * @var string
    */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $info;

    /**
     * Получаем info url
     *
     * @param array $info
     *
     * @return self
     */
    public function setInfo(array $info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Получаем html
     *
     * @param string $html
     *
     * @return self
     */
    public function setHtml($html)
    {
        $charset = $this->getCharset($html);

        $crawler = new Crawler($html);
        $this->title = $this->getTitle($crawler, $html, $charset);
        $this->description = $this->getDescription($crawler, $html, $charset);
        /*if (iconv_strlen($this->description, "utf-8") > 125) {
            $this->description = mb_substr($this->description, 0, 125, "utf-8");
        }*/

        return $this;
    }

    /**
     * Получаем значение title
     *
     * @param Crawler $crawler
     * @param string $html
     * @param string $charset
     *
     * @return string
    */
    private function getTitle(Crawler $crawler, $html, $charset)
    {
        $title = $crawler->filter("head > title")->getNode("");
        if ($title) {
            return $title->textContent;
        }

        preg_match("|<title.*?>(.*)</title>|si", $html, $matches);
        if (isset($matches["1"])) {
            return $this->getString($matches["1"], $charset);
        } else {
            return "";
        }
    }

    /**
     * Получаем значение description
     *
     * @param Crawler $crawler
     * @param string $html
     * @param string $charset
     *
     * @return string
     */
    private function getDescription(Crawler $crawler, $html, $charset)
    {
        $description = $crawler->filter("head > meta")->each(function (Crawler $node, $i) {
            $name = $node->getNode(0)->getAttribute("name");
            $property = $node->getNode(0)->getAttribute("property");
            if ($name == "description" || $name == "keywords" || $property == "og:description") {
                return $node->getNode(0)->getAttribute("content");
            }
        });

        if (is_array($description)) {
            $description = array_values(array_filter($description));
            if (isset($description["0"])) return $description["0"];
        }

        preg_match('/<meta(?=[^>]* name *= *"?description"?) [^>]*?(?<= )content *= *"([^"]*)"[^>]*>/i', $html, $matches);
        if (isset($matches["1"])) {
            return $this->getString($matches["1"], $charset);
        } else {
            return "";
        }
    }

    /**
     * Определяем кодировку сайта
     *
     * @param string $html
     *
     * @return string charset
    */
    private function getCharset($html)
    {
        preg_match('/charset=(.*)/i', $this->info['content_type'], $matches);
        if (isset($matches['1'])) {
            preg_match('/1251/', $matches['1'], $charsetWin);
            if (isset($charsetWin['0'])) {
                if (mb_strtolower($charsetWin['0']) == '1251') {
                    return 'windows-1251';
                }
            }

            return mb_strtolower($matches['1']);
        }

        preg_match('/charset=(?:"|\')?([\w-]+)[^>]*>/i', $html, $matches);
        if (isset($matches['1'])) {
            preg_match('/1251/', $matches['1'], $charsetWin);
            if (isset($charsetWin['0'])) {
                if (mb_strtolower($charsetWin['0']) == '1251') {
                    return 'windows-1251';
                }
            }

            return mb_strtolower($matches['1']);
        }

        return false;
    }

    /**
     * Обрабатываем результаты из регулярки
     *
     * @param string $string
     * @param string $charset
     *
     * @return string
    */
    private function getString($string, $charset)
    {
        if ($charset == false) {
            return "";
        } else if ($charset != "utf-8") {
            return @iconv($charset, 'utf-8', $string);
        }

        return $string;
    }

    /**
     * возвращает значение по домену
     *
     * @return array
     */
    public function getResult()
    {
        $domain = parse_url($this->info['url']);
        $result['domain'] = $domain['host'];
        $result['statusCode'] = $this->info['http_code'];
        $result['sizeDownload'] = number_format($this->info['size_download']  / 1024 , 2, '.', '');
        $result['totalTime'] = number_format($this->info['total_time'], 2, '.', '');
        $result['connectTime'] = number_format($this->info['connect_time'], 2, '.', '');
        $result['title'] = mb_strimwidth($this->title, 0, 125, "...", "utf-8");
        $result['description'] = mb_strimwidth($this->description, 0, 125, "...", "utf-8");

        return $result;
    }
}
