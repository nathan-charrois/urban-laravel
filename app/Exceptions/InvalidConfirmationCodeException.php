<?php

namespace App\Exceptions;

use Exception;

class InvalidConfirmationCodeException extends Exception
{
	public $message = 'Invalid Confirmation Code';
}