<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Foobar extends Facade {
	public static function getFacadeAccessor() {
		return 'foobar';
	}
	
}