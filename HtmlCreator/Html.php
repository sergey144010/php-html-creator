<?php
/**
 * Created by PhpStorm.
 * User: Sergey
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
            'html',
            [
                [
                    'head',
                    [
                        ['meta', null, ['charset'=>'utf-8']],
                        ['title']
                    ]
                ],
                ['body'],
            ],
            ['lang'=>'en']
        ];
        return HtmlCreator::instance()->create($body)->getHtml();
    }

    public static function simplePage()
    {
        echo self::getSimplePage();
    }

    public static function getSimplePage()
    {
        $body = [
            'html',
            [
                [
                    'head',
                    [
                        ['meta', null, ['charset'=>'utf-8']],
                        ['title', 'Simple Page']
                    ]
                ],
                [
                    'body',
                    [
                        ['h1', 'Simple Page'],
                        ['h2', 'Example Input'],
                        [
                            'form',
                            [
                                ['strong', 'Select type'],
                                ['br', null, null, ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['input', 'IE', ['type'=>'radio', 'name'=>'browser', 'value'=>'ie'], ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['br', null, null, ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['input', 'Firefox', ['type'=>'radio', 'name'=>'browser', 'value'=>'firefox'], ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['br', null, null, ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['input', 'Opera', ['type'=>'radio', 'name'=>'browser', 'value'=>'opera'], ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['br', null, null, ['closingTag'=>HtmlCreator::NOT_CLOSE]],
                                ['input', null, ['type'=>'submit', 'value'=>'Send']],
                                ['input', null, ['type'=>'reset', 'value'=>'Reset']],

                            ],
                            ['name'=>'formName1', 'method'=>'post', 'action'=>'action.php']
                        ],
                        ['h2', 'Example Select'],
                        [
                            'form',
                            ['select',
                                [
                                    ['option', 'SelectType', ['disabled'=>HtmlCreator::ONLY_ATTRIBUTE]],
                                    ['option', 'IE', ['value'=>'ie']],
                                    ['option', 'Firefox', ['value'=>'ie', 'selected'=>HtmlCreator::ONLY_ATTRIBUTE]],
                                    ['option', 'Opera', ['value'=>'opera']],
                                ]
                            ],
                            ['name'=>'formName2', 'method'=>'post', 'action'=>'action.php']
                        ],
                    ]
                ],
                ['footer']
            ],
            ['lang'=>'ru']
        ];
        $html = HtmlCreator::instance()->create($body)->getHtml();
        $html = '<!DOCTYPE html>'.$html;
        return $html;
    }

    public static function createPage(array $options)
    {
        echo self::getPage($options);
    }

    public static function getPage(array $options)
    {
        /*
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
        */
    }
}