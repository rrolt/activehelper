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
	

