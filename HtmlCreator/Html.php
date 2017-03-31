<?php
/**
 * Created by PhpStorm.
 * User: Мария
 * Date: 01.04.2017
 * Time: 6:17
 */

namespace sergey144010\HtmlCreator;

use sergey144010\HtmlCreator\HtmlCreator;

/*
 * Wrapper for sergey144010\HtmlCreator\HtmlCreator
 */
class Html
{
    public static function create(array $array)
    {
        HtmlCreator::instance()->create($array)->printHtml();
    }

    public static function getString(array $array)
    {
        return HtmlCreator::instance()->create($array)->getHtml();
    }
}