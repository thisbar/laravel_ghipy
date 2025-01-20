<?php

declare(strict_types=1);

namespace LaravelGhipy\Core\Favorites\Domain;

use LaravelGhipy\Shared\Domain\DomainError;

final class FavoriteAlreadyExists extends DomainError
{
	public const HTTP_CONFLICT = 409;
	public function __construct()
	{
		parent::__construct();
	}

	public function errorCode(): int
	{
		return self::HTTP_CONFLICT;
	}

	protected function errorMessage(): string
	{
		return 'The GIF is already saved as a favorite.';
	}
}