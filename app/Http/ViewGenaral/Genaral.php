<?php 

namespace App\Http\ViewGenaral;

use lluminate\View\View;
use App\Models\Setting;

/**
 * 
 */
class Genaral
{
	private $setting;
	public function __construct(Setting $setting)
	{
		$this -> setting = $setting;
	}


	public function genaral(View $view){
		$footer = $this -> setting -> where('config_key','footer')-> value('config_value');
		return $footer;
	}
}