<?php

declare(strict_types=1);

namespace LaravelGhipy\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;
}
