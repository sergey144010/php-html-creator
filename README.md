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

use sergey144010\HtmlCreator\HtmlCreator;
use sergey144010\HtmlCreator\Html;

$array = ['p', 'Hello', ['class'=>'paragraf']];

Html::create($tags);

/* Return
<p class="paragraf">Hello</p>
*/

```

### Structure $array
Input array may be next structure:
```php
$array = [$tag, $body, $attributes, $options]
```

#### $tag
$tag - it is html tag.

#### $body
$body - it is text or $array or $arrays = [$array,$array]
```php
$body = 'Text';
$body = ['p', 'Text', ['class'=>'paragraf']];
$body = [
    ['p', 'Text', ['class'=>'paragraf']],
    ['p', 'Text', ['class'=>'paragraf'], ['closingTag'=>HtmlCreator::NOT_CLOSE]],
    ['p', 'Text', ['class'=>'paragraf']],
];
```

#### $attributes
$attributes - it is array attributes html tag. Have one special mark HtmlCreator::ONLY_ATTRIBUTE
```php
$attributes = ['class'=>'paragraf'];
$attributes = ['class'=>'paragraf', 'value'=>'Firefox'];
$attributes = ['class'=>'paragraf', 'value'=>'Firefox', 'disabled'=>HtmlCreator::ONLY_ATTRIBUTE];
```

#### $options
$options - it is array. Have 3 options.
```php
$options['beforeBody'] = 'Text before next tag';
$options['afterBody'] = 'Text after next tag';
$options['closingTag'] = HtmlCreator::NOT_CLOSE;
```

#### Examples
```php
$array = ['p'];
$array = ['p', 'Text'];
$array = ['p', 'Text', ['class'=>'paragraf']];
$array = ['p', 'Text', ['class'=>'paragraf', 'attr1'=>'attr1']];
$array = ['p', 'Text', ['class'=>'paragraf'], ['closingTag'=>HtmlCreator::NOT_CLOSE]];
$array = ['p', 'Text'];
$array = ['p', ['span', 'Text']];
$array = ['p', ['span', 'Text', ['class'=>'span']]];
$array = ['p', ['span', 'Text', ['class'=>'classSpan']], ['class'=>'classP']];
$array = ['p', null, null, ['closingTag'=>HtmlCreator::NOT_CLOSE]];
$array = ['p', null, ['attr1'=>HtmlCreator::ONLY_ATTRIBUTE]];
```

##  Html class
Html class have methods
create(),
getString(),
emptyPage(),
simplePage(),
and other.

## HtmlCreator class
Usage
```php
HtmlCreator::instance()->create($array)->printHtml();
# or
HtmlCreator::instance()->create($array)->getHtml;
```

Examples
--------

Html class is a wrapper for HtmlCreator class

```php
use sergey144010\HtmlCreator\Html;

# Print
Html::create(['p']);

# Get string
var_dump(Html::getString(['p']));

```

Usage HtmlCreator class

```php
use sergey144010\HtmlCreator\HtmlCreator;

# Print
HtmlCreator::instance()->create(['p'])->printHtml();

# Get string
var_dump(HtmlCreator::instance()->create(['p'])->getHtml());
```