##Active Helper
active helper is a simple active status system for your links in laravel 4
###How to install
Add the following line in your `composer.json`
	
	"digithis/activehelper": "dev-master"

Then run `composer update`

In `app/config.app.php`, add the following line to the `providers` array 

	'Digithis\Activehelper\ActivehelperServiceProvider',
	

In the `aliases` array, add the following line

	'Active'  => 'Digithis\Activehelper\ActiveFacade',
	
###How to use
Create a link and its active status

```php
echo Active::link('users', URL::to('users'), 'Show all users');
```
This means that if the current request is `users`, your link `Show all users` will have a `.active` class

You can add several more routes as a first parameter, for exemple :

```php
echo Active::link(array('users', 'user/add', 'user/edit'), URL::to('users'), 'Show all users');
```
	
You can also use `*` as a pattern or exclude routes with `not:`

```php
echo Active::link(array('user*','not:user/edit'), URL::to('users'), 'Show all users');
```
Which means that if the request starts with `user` but is not `user/edit`, the link has a `.active` class

You can also set your own attributes if you want, for exemple

```php
echo Active::link(array('group*','not:groups*'), URL::to('group'), 'Show group', array('id' => 'mycustomclass');
```


