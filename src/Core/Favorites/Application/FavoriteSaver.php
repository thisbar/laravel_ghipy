<?php

declare(strict_types=1);

namespace LaravelGhipy\Core\Favorites\Application;

use LaravelGhipy\Core\Favorites\Domain\Favorite;
use LaravelGhipy\Core\Favorites\Domain\FavoriteAliasUniquenessValidator;
use LaravelGhipy\Core\Favorites\Domain\FavoriteRepository;
use LaravelGhipy\Core\Favorites\Domain\FavoriteUniquenessValidator;

final class FavoriteSaver
{
	private FavoriteUniquenessValidator $favoriteUniquenessValidator;
	private FavoriteAliasUniquenessValidator $favoriteAliasUniquenessValidator;

	public function __construct(private readonly FavoriteRepository $repository)
	{
		$this->favoriteUniquenessValidator      = new FavoriteUniquenessValidator($repository);
		$this->favoriteAliasUniquenessValidator = new FavoriteAliasUniquenessValidator($repository);
	}

	public function save(Favorite $favorite): void
	{
		$this->favoriteUniquenessValidator->validate($favorite->userId(), $favorite->gifId());
		$this->favoriteAliasUniquenessValidator->validate($favorite->userId(), $favorite->alias());

		$this->repository->save($favorite);
	}
}