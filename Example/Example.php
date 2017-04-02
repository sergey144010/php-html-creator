<?php
namespace sergey144010;

/*
	Переместить этот файл в корень проекта
*/

require('vendor/autoload.php');

use sergey144010\HtmlCreator\Html;

#print('<!DOCTYPE HTML>');
$array = ['p', 'Text'];
Html::create($array);