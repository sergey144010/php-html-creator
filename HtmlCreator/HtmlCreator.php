<?php
namespace sergey144010;
/*
��������� ����

############
������ �1:
############

$array = [
	['p'=>'Text many many text', 'class'=>'text', 'id'=>'paragraph1',
		['div', 'class'=>'text2', 'id'=>'paragraph2',
			['span', 'class'=>'text3', 'id'=>'paragraph3'
			]
		]
	]
	,
	['div',['div']]
];

use sergey144010\HtmlCreator as Html;

Html::create($array);

������ ��������� ������:

<p class="text" id="paragraph1">
	Text many many text
	<div class="text2" id="paragraph2">
		<span class="text3" id="paragraph3"></span>
	</div>
</p>
<div>
	<div></div>
</div>

############
������ �2 - ������� Html ��������:
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

������ ��������� ������:

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

############
�����:
############

[
	[tag1, option1=>value1, option2=>value2 ... ,
		[tag2, option21=>value21, option22=>value22 ... ,
			[tag3, option31=>value31, option32=>value32 ... ,
				...
			],
			...
		],
		...
	],
	...
]

*/

class HtmlCreator
{
	static private $string;
	
	public static function create(array $array){
		self::checkType($array);
		self::main($array);
		self::printHtml($array);
		
	}
	public static function printHtml(){
		echo self::$string;
	}
	private static function checkType($array){
		foreach($array as $key=>$value){
			if(!is_array($value)){
				throw new Exception ('Incoming schema is not correct');
			};
		};
	}
	private static function main($array){
		foreach($array as $subArray){
			self::$string .= self::simpleArray($subArray);
		};
	}
	private static function simpleArray(array $array){
		$count=count($array);
		$i=0;
		$string=false; $tag=false;
		$iterateArray=false; $stringIterateArray=false;
		foreach($array as $key=>$val){
			/* ������ ������� ������� */
			if($i==0){
				if(is_int($key)){
					$tag = $val;
					$tagVal = false;
					$string .= '<'.$val;
				}else{
					$tag = $key;
					$tagVal = $val;
					$string .= '<'.$key;
				};
				if($i==0 && $count==1){
					$string .= '>'.$tagVal.'</'.$tag.'>';
				};
			/* ��������� ������� ������� */
			}elseif($i == ($count-1)){
				if(!is_array($val)){
					$string .= ' '.$key.'="'.$val.'"';
				}else{
					$iterateArray[] = self::simpleArray($val);
				};
				if($iterateArray){
					foreach($iterateArray as $partIterateArray){
						$stringIterateArray .= $partIterateArray;
					};
				}else{
					$stringIterateArray = false;
				};
				$string .= '>'.$tagVal.$stringIterateArray.'</'.$tag.'>';
			/* ��� ��������� �������� ������� */
			}else{
				if(!is_array($val)){
					$string .= ' '.$key.'="'.$val.'"';
				}else{
					$iterateArray[] = self::simpleArray($val);
				};
			};
			$i++;
		};
		return $string;
	}
}