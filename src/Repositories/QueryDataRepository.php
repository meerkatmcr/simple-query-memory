<?php

namespace MeerkatMcr\SimpleQueryMemory\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class QueryDataRepository {

    public function forget(string $key)
    {
        Session::forget("query_string.{$key}");
    }

    public function get(string $key, array $parameters = [])
    {
        if (!Session::has("query_string.{$key}")) {
            return null;
        }

        $data = Session::get("query_string.{$key}");

        if (count($parameters) == 0) {
            return $data;
        } else {
            $required_data = [];

            foreach($parameters as $parameter) {
                if (Arr::has($data, $parameter)) {
                    $required_data[$parameter] = Arr::get($data, $parameter);
                }
            }
            return $required_data;
        }
    }
}
