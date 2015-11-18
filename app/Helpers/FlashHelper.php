<?php

namespace App\Helpers;

class FlashHelper {

	public function create($message, $level = 'info')
	{
		return 	session()->flash('flash_message', [
			'message' => $message,
			'level' => $level
		]);
	}
	
	public function info($message)
	{
		return $this->create($message);
	}

	public function success($message)
	{
		return $this->create($message, 'success');
	}

	public function error($message)
	{
		return $this->create($message, 'error');
	}
}