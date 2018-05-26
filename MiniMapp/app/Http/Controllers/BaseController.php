<?php

namespace App\Http\Controllers;


use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as RoutingController;

class BaseController extends RoutingController
{
    use Helpers;
    
    protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
