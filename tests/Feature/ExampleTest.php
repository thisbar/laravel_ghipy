<?php

declare(strict_types=1);

namespace LaravelGhipy\Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelGhipy\Tests\TestCase;

final class ExampleTest extends TestCase
{
	/**
	 * A basic test example.
	 */
	public function test_the_application_returns_a_successful_response(): void
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}
}
