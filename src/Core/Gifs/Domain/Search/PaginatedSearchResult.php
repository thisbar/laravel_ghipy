<?php

declare(strict_types=1);

namespace LaravelGhipy\Core\Gifs\Domain\Search;

use LaravelGhipy\Core\Gifs\Domain\GifCollection;
use LaravelGhipy\Shared\Domain\ValueObject\Search\Pagination;
use LaravelGhipy\Shared\Domain\ValueObject\Search\SearchMetadata;

final class PaginatedSearchResult extends SearchResult
{
	public function __construct(
		GifCollection $data,
		SearchMetadata $metadata,
		private Pagination $pagination
	) {
		parent::__construct($data, $metadata);
	}

	public function pagination(): array
	{
		return $this->pagination->toArray();
	}

	public function toArray(): array
	{
		return [
			'data'       => $this->data?->toArray(),
			'metadata'   => $this->metadata->toArray(),
			'pagination' => $this->pagination->toArray(),
		];
	}
}