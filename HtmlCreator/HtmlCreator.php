<?php

namespace sergey144010\HtmlCreator;


class HtmlCreator
{
    const NOT_CLOSE = 'not_close';

	private $string;
    private $strings;
    private $stringsBody;

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
     * ['p', [['a'],['b']], ...]
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
            $closingTag = null;
        }else{
            $beforeBody = null;
            $afterBody = null;
            $closingTag = null;
            if(isset($tagOptions[3]['beforeBody'])){
                $beforeBody = $tagOptions[3]['beforeBody'];
            };
            if(isset($tagOptions[3]['afterBody'])){
                $afterBody = $tagOptions[3]['afterBody'];
            };
            if(isset($tagOptions[3]['closingTag'])){
                $closingTag = $tagOptions[3]['closingTag'];
            };
        };
        if(isset($closingTag) && $closingTag == self::NOT_CLOSE){
            $template = '<'.$tag.$attributes.'>'.$beforeBody.$body.$afterBody;
        }else{
            $template = '<'.$tag.$attributes.'>'.$beforeBody.$body.$afterBody.'</'.$tag.'>';
        };

        $this->string = $template;
    }

    private function prepareBody($body)
    {
        $string = null;
        if(is_string($body)){
            $string = $body;
        };
        if(is_array($body)){
            if(is_array($body[0])){
                /*
                foreach ($body as $tag) {
                    $this->createTag($tag);
                    $this->stringsBody .= $this->string;
                };
                */
                return self::instance()->create($body)->getHtml();
                #return $this->stringsBody;
            };
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