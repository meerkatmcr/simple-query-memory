# simple-query-memory
Very simple package to store query-string data in the session on Laravel 5.x 
applications

## Installation
* Install the package with `composer install meerkatmcr/simple-query-memory`
* Put the `\MeerkatMcr\SimpleQueryMemory\Middleware\RememberQueryString` 
middleware in the `$routeMiddleware` array in `app/Http/Kernel.php`. The usage
instructions will assume that it is named `query`.

## Usage

### Storing data
On a route where you want the query string to be remembered in the session,
add the `query` middleware with a parameter which will identify that particular
route's data when it is retrieved. For example:
 
`Route::get('welcome', 'WelcomeController')->middleware('query:welcome');`
 
### Retrieving data
To retrieve the data, use the
`\MeerkatMcr\SimpleQueryMemory\Facades\QueryString` facade. This provides a
`QueryString::get()` method. Give that method the route's key, and all data
stored will be returned: `QueryString::get('welcome')`. If there is no data,
`null` will be returned.
  
To retrieve particular items, pass a list of names
as the second argument: `QueryString::get('welcome', ['id', 'name'])`. This
will return an associative array of those items. If a particular item is not
stored, the array will be missing that key. In particular, if no items are
found at all, an empty array will be returned.

### Deleting data
To forget all data stored for a particular route, call
`QueryString::forget()` with that route's key: `QueryString::forget('welcome')`.

## Notes
Data is stored in the session under `query_string`, with each key's data kept
separately. For example, the data for the key `welcome` is stored under
`query_string.welcome`.
