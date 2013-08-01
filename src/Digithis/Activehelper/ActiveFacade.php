<?php namespace Digithis\Activehelper;
 
use Illuminate\Support\Facades\Facade;
 
class ActiveFacade extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'activehelper'; }
 
}