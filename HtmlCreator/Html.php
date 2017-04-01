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

    public static function emptyPage()
    {
        echo self::getEmptyPage();
    }

    public static function getEmptyPage()
    {
        $body = [
            ['html',
                ['head',
                    ['meta', 'charset'=>'utf-8'],
                    ['title'],
                ],
                ['body']
            ]
        ];
        return HtmlCreator::instance()->create($body)->getHtml();
    }

    public static function createPage(array $options)
    {
        echo self::getPage($options);
    }

    public static function getPage(array $options)
    {
        if(!isset($options['title'])){$options['title'] = null;};
        if(!isset($options['bodyText'])){$options['bodyText'] = null;};
        if(!isset($options['body'])){$options['body'] = null;};

        $optionsBody = ['body'];
        foreach ($options['body'] as $tag) {
            $optionsBody[$tag];
        }


        $body = [
            ['html',
                ['head',
                    ['meta', 'charset'=>'utf-8'],
                    ['title'=>$options['title']],
                ],
                $optionsBody
            ]
        ];

        return HtmlCreator::instance()->create($body)->getHtml();
    }
}