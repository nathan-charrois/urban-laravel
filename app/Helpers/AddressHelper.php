<?php

namespace App\Helpers;

class AddressHelper {

	/**
	 * Encode string to URL readable.
	 *
	 * @param  string $text
	 * @return string
	 */
	public static function encodeURL($text)
	{
		return str_replace(' ', '+', $text);
	}

	/**
	 * Decode string from URL.
	 *
	 * @param  string $text
	 * @return string
	 */
	public static function decodeURL($text)
	{
		return str_replace('+', ' ', $text);
	}
}