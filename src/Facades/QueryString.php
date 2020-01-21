<?php

namespace MeerkatMcr\SimpleQueryMemory\Facades;

use Illuminate\Support\Facades\Facade;
use MeerkatMcr\SimpleQueryMemory\Repositories\QueryDataRepository;

/**
 * @method static void forget(string $key)
 * @method static array|null get(string $key, array $parameters = [])
 */
class QueryString extends Facade {
    protected static function getFacadeAccessor()
    {
        return QueryDataRepository::class;
    }
}
