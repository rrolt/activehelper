<?php namespace Digithis\Activehelper;

use Request;

class Activehelper {

	/**
	* Current request path.
	*
	* @var string
	*/
	protected $request;

	/**
	* Routes to exclude.
	*
	* @var array
	*/
	protected $bad_routes = array();

	/**
	* Routes to check.
	*
	* @var array
	*/
	protected $routes = array();

	/**
	* Generate link with active state.
	*
	* @param array $routes
	* @param string $url
	* @param string $value
	* @param array $attributes
	* @return string
	*/
	public function link($routes, $url, $value = '', $attributes = array('class' => 'active'))
	{
		if(empty($value))
		{
			$value = $url;
		}

		$output = '<a href="'.$url.'"';

		if($this->is($routes))
		{
			$output.= $this->putAttributes($attributes);
		}

		$output.= '>'.$value.'</a>';
		
		return $output;
	}

	/**
	 * Get current state.
	 *
	 * @param array $routes
	 * @param boolean 
	 */
	public function is($routes)
	{
		$this->request = Request::path();

		if(!is_array($routes))
		{
			$routes = array($routes);
		}
		$this->parseRoutes($routes);

		foreach($this->routes as $route)
		{
			if(!Request::is($route))
			{
				continue;
			}

			foreach($this->bad_routes as $bad_route)
			{
				if(str_is($bad_route, $this->request))
				{
					return false;
				}
			}
			return true;		
		}
	    return false;
	}

	/**
	* Separate routes in clean routes and excluded routes.
	*
	* @param array $route
	* @return void
	*/
	private function parseRoutes($routes)
	{
		$this->routes = $routes;

		foreach($routes as $r => $route)
		{
			if (strpos($route, 'not:') !== false)
			{
				$bad_route =  substr($route, strpos($route, "not:")+4);
				$this->bad_routes[] = $bad_route;

				unset($this->routes[$r]);
			}
		}
	}

	/**
	* Attributes to string.
	*
	* @param array $attributes
	* @return string
	*/
	private function putAttributes($attributes)
	{
		$output = '';

		foreach($attributes as $attribute => $value)
		{
			$output.= ' '.$attribute. '="'.$value.'"';
		}

		return $output;
	}
}
