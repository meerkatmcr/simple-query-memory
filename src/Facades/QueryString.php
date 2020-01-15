<?php

namespace MeerkatMcr\SimpleQueryMemory\Facades;

use Illuminate\Support\Facades\Facade;
use MeerkatMcr\SimpleQueryMemory\Repositories\QueryDataRepository;

class QueryString extends Facade {
    protected static function getFacadeAccessor()
    {
        return QueryDataRepository::class;
    }
}
