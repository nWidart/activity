[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nWidart/activity/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nWidart/activity/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/nwidart/activity/v/stable.svg)](https://packagist.org/packages/nwidart/activity) [![Total Downloads](https://poser.pugx.org/nwidart/activity/downloads.svg)](https://packagist.org/packages/nwidart/activity) [![Latest Unstable Version](https://poser.pugx.org/nwidart/activity/v/unstable.svg)](https://packagist.org/packages/nwidart/activity) [![License](https://poser.pugx.org/nwidart/activity/license.svg)](https://packagist.org/packages/nwidart/activity)

# Activity


Activity lets you list your current activity on Github. Soon from Bitbucket as well.

**Important note**

Keep in mind this package is still in W.I.P., meaning not all event types are implemented yet.

The event types **not implemented** yet:

- CommitCommentEvent
- ForkEvent
- PublicEvent
- ReleaseEvent


Events **available**:

- CreateEvent
- DeleteEvent
- IssueCommentEvent
- PullRequestEvent
- PushEvent
- WatchEvent




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

### Constructor/method injection

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

The `activities` method accepts integer that represents the limit of activities. It defaults to 5.

### Using the Facade

```php
$activities = ActivityFacade::forUser('nwidart')->activities();
```

The response will be:

```
array (size=5)
  0 =>
    array (size=6)
      'time' => string '2 hours ago' (length=11)
      'actor' => string 'nWidart' (length=7)
      'actor_avatar' => string 'https://avatars.githubusercontent.com/u/882397?' (length=47)
      'verb' => string 'pushed to ' (length=10)
      'action_object' => string 'nWidart/portfolio' (length=17)
      'target' => string 'https://github.com/nWidart/portfolio/commit/5fae34f185d7b52e4de4c3597df7218af024c9e1' (length=84)
  1 =>
    array (size=6)
      'time' => string '8 hours ago' (length=11)
      'actor' => string 'nWidart' (length=7)
      'actor_avatar' => string 'https://avatars.githubusercontent.com/u/882397?' (length=47)
      'verb' => string 'pushed to ' (length=10)
      'action_object' => string 'nWidart/portfolio' (length=17)
      'target' => string 'https://github.com/nWidart/portfolio/commit/bba88e3d9bbaa1c13e98100d3da7fa3becbbd3f1' (length=84)
  2 =>
    array (size=6)
      'time' => string '8 hours ago' (length=11)
      'actor' => string 'nWidart' (length=7)
      'actor_avatar' => string 'https://avatars.githubusercontent.com/u/882397?' (length=47)
      'verb' => string 'pushed to ' (length=10)
      'action_object' => string 'nWidart/portfolio' (length=17)
      'target' => string 'https://github.com/nWidart/portfolio/commit/275c0627c449eb3370bf50e46bad8987d74e1c9a' (length=84)
  3 =>
    array (size=6)
      'time' => string '8 hours ago' (length=11)
      'actor' => string 'nWidart' (length=7)
      'actor_avatar' => string 'https://avatars.githubusercontent.com/u/882397?' (length=47)
      'verb' => string 'pushed to ' (length=10)
      'action_object' => string 'nWidart/portfolio' (length=17)
      'target' => string 'https://github.com/nWidart/portfolio/commit/beba6f74cd40eef52a46195026e80d136beb90ee' (length=84)
  4 =>
    array (size=6)
      'time' => string '13 hours ago' (length=12)
      'actor' => string 'nWidart' (length=7)
      'actor_avatar' => string 'https://avatars.githubusercontent.com/u/882397?' (length=47)
      'verb' => string 'pushed to ' (length=10)
      'action_object' => string 'nWidart/portfolio' (length=17)
      'target' => string 'https://github.com/nWidart/portfolio/commit/7c23584cd4dca9eea529a15fc61da0afe2ea0485' (length=84)
```

## License (MIT)

Copyright (c) 2013 [Nicolas Widart](http://www.nicolaswidart.com) , n.widart@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.