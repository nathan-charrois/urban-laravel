<?php
namespace App;

use App\User;
use App\Profie;
use App\Events\UserWasCreated;
use Mockery as m;

class AddProfileToUserTest extends \TestCase {

	/** @test */
	function test_profile_is_created_when_user_created()
	{
		$user = factory(User::class)->create();
		//event(new UserWasCreated($user));
		//fwrite(STDERR, print_r($user->profile, TRUE));
		//$this->assertCount(1, $user->profile);
	}
}