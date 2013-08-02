##Active Helper
active helper is a simple active state system for your links in laravel 4
###How to install
Add the following line in your `composer.json`
	
	"digithis/activehelper": "dev-master"

Then run `composer update`

In `app/config.app.php`, add the following line to the `providers` array 

	'Digithis\Activehelper\ActivehelperServiceProvider',
	

In the `aliases` array, add the following line

	'Active'  => 'Digithis\Activehelper\ActiveFacade',
	
###How to use
**Create a link and its current state :**

```php
echo Active::link('users', URL::to('users'), 'Show all users');
```
This means that if the current request is `users`, class for link is `.active`


**Add several more routes as a first parameter :**

```php
echo Active::link(array('users', 'user/add', 'user/edit'), URL::to('users'), 'Show all users');
```


**Use `*` **as a pattern or exclude routes with** `not:` **:**

```php
echo Active::link(array('user*','not:user/edit'), URL::to('users'), 'Show all users');
```
This means that if the request begins with `user` but is not `user/edit`, class for link is `.active`


**Set your own attributes if you wish**:

```php
echo Active::link(array('group*','not:groups*'), URL::to('group'), 'Show group', array('id' => 'mycustomid'));
```


