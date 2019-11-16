<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\Concerns\ImpersonatesUsers;
use Tymon\JWTAuth\Facades\JWTAuth;



class CustomRediretions extends TestCase
{
	/**
	 * Index method test
	 *
	 * @return void
	 */
	public function testIndexWithLogin()
	{
		$loginUser = [
			'username' => 'superadmin',
			'password' => 'superadmin',
		];

		$loginResponse = $this->withHeaders([])->json('POST', '/api/login', $loginUser);

		$token = $loginResponse->baseResponse->original['data']['token'];

		$response = $this->withHeaders([
			'Authorization' => 'Bearer ' . $token
		])->json('GET', '/api/custom-redirections');

		$response->assertStatus(200);
	}


	/**
	 * Index method test
	 *
	 * @return void
	 */
	public function testIndexWithOutLogin()
	{
		$response = $this->get('/api/custom-redirections/');
		$response->assertStatus(401);
	}

	/**
	 * Index method test
	 *
	 * @return void
	 */
	public function testShowWithoutLogin()
	{
		$response = $this->get('/api/custom-redirections/1');
		$response->assertStatus(401);
	}

	public function testCreateWithoutLogin()
	{
		$response = $this->json('POST', '/api/custom-redirections/', [
			"source_url" => "http://www.gisdsssdsddssddslason.net/dignissimos-perferendis-totam-autem-cupiditate-nulla-harum",
			"target_url" => "http://www.dubuque.com/iste-maiores-molestias-minus-assumenda-et.html",
			"status_code" => 301
		]);

		$response->assertStatus(401);
	}

	public function testUpdateWithoutLogin()
	{
		$response = $this->json('PUT', '/api/custom-redirections/11', [
			"source_url" => "http://www.gisdsssdsddssddslason.net/dignissimos-perferendis-totam-autem-cupiditate-nulla-harum"
		]);

		$response->assertStatus(401);
	}

	public function testDestroyWithoutLogin()
	{
		$response = $this->delete('/api/custom-redirections/1');

		$response->assertStatus(401);
	}

	/**
	 * Return request headers needed to interact with the API.
	 *
	 * @return Array array of headers.
	 */
	protected function headers($user = null)
	{
		$headers = ['Accept' => 'application/json'];

		if (!is_null($user)) {
			$token = JWTAuth::fromUser($user);
			JWTAuth::setToken($token);
			$headers['Authorization'] = 'Bearer ' . $token;
		}

		return $headers;
	}
}
