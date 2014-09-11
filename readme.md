# Activity

Activity lets you list your current activity on Github.

## Installation

Add the following in you [composer](http://getcomposer.org).json file:

```json
{
    "require": {
        "nwidart/activity": "dev-master"
    }
}
```

Add the service provider in `app/config/app.php`

```php
'providers' => [
	...
    'Nwidart\Activity\ActivityServiceProvider'
]
```

## Usage

The usage is very simple and straightforward.
Since this is still a W.I.P. there's no Facade yet. You can inject via the constructor though.

```php
public function __construct(Activity $activity)
{
    $this->activity = $activity;
}

public function getIndex()
{
    $activities = $this->activity->forUser('nwidart')->activities();
}
```

## License (MIT)

Copyright (c) 2013 [Nicolas Widart](http://www.nicolaswidart.com) , n.widart@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.