<?php
namespace sergey144010;

/*
	Переместить этот файл в корень проекта
*/

require('vendor/autoload.php');

use sergey144010\HtmlCreator as Html;

$array_1 = [
	['p', 'class'=>'p_radio', ['label'=>'Каким браузером в основном пользуетесь:'],
		['input'=>'Internet Explorer', 'type'=>'radio', 'name'=>'browser', 'value'=>'ie'],
		['input'=>'Opera', 'type'=>'radio', 'name'=>'browser', 'value'=>'opera'],
		['input'=>'Firefox', 'type'=>'radio', 'name'=>'browser', 'value'=>'firefox'],
	]
];

$array_2 = [
	['table',
		['thead',
			['tr', 
				['td'=>'One'], ['td'=>'Two'], ['td'=>'Three']
			],
		],
		['tbody',
			['tr', 
				['td'=>'1'], ['td'=>'2'], ['td'=>'3']
			],
			['tr', 
				['td'=>'1'], ['td'=>'2'], ['td'=>'3']
			],
			['tr', 
				['td'=>'1'], ['td'=>'2'], ['td'=>'3']
			]
		]
	]
];

$array_3 = [
	['html',
		['head',
			['meta', 'charset'=>'utf-8'],
			['title'=>'Title'],
		],
		['body',
			['h1'=>'Example']
		]
	]
];

$array_4 = [
	['html',
		['head',
			['meta', 'charset'=>'utf-8'],
			['title'=>'Title'],
		],
		['body',
			['h1'=>'Example Form & Select'],
			['form', 'action'=>'select1.php', 'method'=>'post',
				['p',
					['select', 'size'=>'3', 'multiple', 'name'=>'hero[]',
						['option'=>'Выберите героя', 'disabled'],
						['option'=>'Чебурашка', 'value'=>'Чебурашка'],
						['option'=>'Крокодил Гена', 'selected', 'value'=>'Крокодил Гена'],
						['option'=>'Шапокляк', 'value'=>'Шапокляк'],
						['option'=>'Крыса Лариса', 'value'=>'Крыса Лариса'],
					]
				],
				['p',
					['input', 'type'=>'submit', 'value'=>'Отправить']
				]
			]
		]
	]
];


$part = 
['select', 'size'=>'3', 'multiple', 'name'=>'hero[]',
	['option'=>'Выберите героя', 'disabled'],
	['option'=>'Чебурашка', 'value'=>'Чебурашка'],
	['option'=>'Крокодил Гена', 'selected', 'value'=>'Крокодил Гена'],
	['option'=>'Шапокляк', 'value'=>'Шапокляк'],
	['option'=>'Крыса Лариса', 'value'=>'Крыса Лариса'],
];
$array_5 = [
	['html',
		['head',
			['meta', 'charset'=>'utf-8'],
			['title'=>'Title'],
		],
		['body',
			['h1'=>'Example Form & Select'],
			['form', 'action'=>'select1.php', 'method'=>'post',
				['p',$part],
				['p',
					['input', 'type'=>'submit', 'value'=>'Отправить']
				]
			]
		]
	]
];

$array_6 = ['p'=>'Text', 'class'=>'p_class', ['span'=>'Text span', 'class'=>'span_class', ['div']], ['b'=>'Text']];

$array_7 = [['p'=>'Text', 'class'=>'p_class', ['span'=>'Text span', 'class'=>'span_class', ['div']], ['b'=>'Text']], ['div']];

print('<!DOCTYPE HTML>');
Html::create($array_6);