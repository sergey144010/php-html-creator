<?php
namespace sergey144010\HtmlCreator;
/*
Вложенные теги

############
# Пример №2 - Простая Html страница:
############

$array = [
	['html', 'xmlns'=>'http://www.w3.org/1999/xhtml', 'lang'=>'ru',
		['head',
			['title'=>'Simple Html Page']
		],
		['body',
			['h1'=>'Simple Html Page'],
			['p',
				['span'=>'Simple text', 'class'=>'fontColorRed'],
				['span'=>'Example text', 'class'=>'fontColorGreen'],
			],
			['p',
				['span'=>'Simple text', 'class'=>'fontColorBlue'],
				['span'=>'Example text', 'class'=>'fontColorWhite'],
			],
			['h2'=>'Simple Example'],
			['p',
				['span'=>'Simple text', 'class'=>'fontColorBlue'],
				['span'=>'Example text', 'class'=>'fontColorWhite'],
			],
			['footer',
				['div', 'class'=>'container footer-content']
			],
		]
	]
];


use sergey144010\HtmlCreator as Html;

Html::create($array);

Вернёт следующую строку:

<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
	<head>
		<title>Simple Html Page</title>
	</head>
	<body>
		<h1>Simple Html Page</h1>
		<p>
			<span class="fontColorRed">Simple text</span>
			<span class="fontColorGreen">Example text</span>
		</p>
		<p>
			<span class="fontColorBlue">Simple text</span>
			<span class="fontColorWhite">Example text</span>
		</p>
		<h2>Simple Example</h2>
		<p>
			<span class="fontColorBlue">Simple text</span>
			<span class="fontColorWhite">Example text</span>
		</p>
		<footer>
			<div class="container footer-content"></div>
		</footer>
	</body>
</html>

*/



class HtmlCreator
{
	private $string;
    private $strings;

    public static function instance()
    {
        return new self;
    }

    /*
     * [$tag, $body, $attributes, $options];
     *
     * or
     *
     * [
     *     [$tag, $body, $attributes, $options],
     *     [$tag, $body, $attributes, $options],
     *     [$tag, $body, $attributes, $options],
     * ]
     *
     * @param array $tags
     */
	public function create(array $tags){
        if(is_string($tags[0])){
            $this->createTag($tags);
            return $this;
        };
        foreach ($tags as $tag) {
            $this->createTag($tag);
            $this->strings .= $this->string;
        };
        $this->string = $this->strings;
        return $this;
	}

    public function getHtml()
    {
        return $this->string;
    }

	public function printHtml(){
		echo $this->string;
	}

    /*
     * [$tag, $body, $attributes, $options];
     *
     * ['p', 'Text paragraf', ['class'=>'text', 'attr'=>'123'], ['beforeBody'=>'beforeText', 'afterBody'=>'afterText']]
     * ['p', ['a', 'Link', ['class'=>'Link']]]
     *
     * @param string $tag
     * @param string|array $body
     * @param array $attributes
     * @param array $options
     */
    private function createTag(array $tagOptions)
    {
        if(!isset($tagOptions[0])){
            $tag = null;
        }else{
            $tag = $tagOptions[0];
        };
        if(!isset($tagOptions[1])){
            $body = null;
        }else{
            $body = $this->prepareBody($tagOptions[1]);
        };
        if(!isset($tagOptions[2])){
            $attributes = null;
        }else{
            $attributes = $this->prepareAttributes($tagOptions[2]);
        };
        if(!isset($tagOptions[3])){
            $beforeBody = null;
            $afterBody = null;
        }else{
            $beforeBody = null;
            $afterBody = null;
            if(isset($tagOptions[3]['beforeBody'])){
                $beforeBody = $tagOptions[3]['beforeBody'];
            };
            if(isset($tagOptions[3]['afterBody'])){
                $afterBody = $tagOptions[3]['afterBody'];
            };
        };
        $template = '<'.$tag.$attributes.'>'.$beforeBody.$body.$afterBody.'</'.$tag.'>';
        $this->string = $template;
    }

    private function prepareBody($body)
    {
        $string = null;
        if(is_string($body)){
            $string = $body;
        };
        if(is_array($body)){
            $this->createTag($body);
            $string = $this->string;
        };
        return $string;
    }

    private function prepareAttributes(array $attributes)
    {
        $string = null;
        foreach ($attributes as $attribute => $value) {
            $string .= ' '.$attribute.'="'.$value.'"';
        }
        return $string;
    }
}