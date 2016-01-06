<?php

namespace App\Helpers;

class FlashHelper {

	/**
	 * Create a flash message.
	 *
	 * @param  string $message
	 * @param  string $level
	 * @return void
	 */
	public function create($message, $level = 'info')
	{
		return 	session()->flash('flash_message', [
			'message' => $message,
			'level' => $level
		]);
	}
	
	/**
	 * Create an informative flash message.
	 * 
	 * @param  string $message
	 * @return void
	 */
	public function info($message)
	{
		return $this->create($message);
	}

	/**
	 * Create a success flash message.
	 * 
	 * @param  string $message
	 * @return void
	 */
	public function success($message)
	{
		return $this->create($message, 'success');
	}

	/**
	 * Create an error flash message.
	 * 
	 * @param  string $message
	 * @return void
	 */
	public function error($message)
	{
		return $this->create($message, 'error');
	}
}