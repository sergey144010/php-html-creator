php-html-creator
==========================

Install
-------

Add repositories and require in composer.json file

 ```php
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/sergey144010/php-html-creator"
        }
    ],
    "require": {
        "sergey144010/php-html-creator": "@dev"
    }
}
 ```
and make

composer.phar update

Usage
-----

```php
require('vendor/autoload.php');

use sergey144010\HtmlCreator as Html;

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

Html::create($array);

/*
Result：
<p class="text" id="paragraph1">
	Text many many text
	<div class="text2" id="paragraph2">
		<span class="text3" id="paragraph3"></span>
	</div>
</p>
<div>
	<div></div>
</div>
*/

```

Example
-------

```php
############
# Пример №1:
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

Html::create($array);

# Вернёт следующую строку:

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

# Вернёт следующую строку:

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
# Схема:
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

```