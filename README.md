# Tatango

A PHP package for working w/ the Tatango API.

## Install

Normal install via Composer.

## Usage

```php
use Travis\Tatango;

// submit
$response = Tatango::run($username, $apikey, 'lists/<YOUR_LIST_ID>/subscribers', [
    'page' => 1,
]);
```

The response will look like this:

```
stdClass Object
(
    [status] => OK
    [per_page] => 10
    [count] => 12345
    [pages_count] => 123
    [page] => 1
    [phone_numbers] => Array
        (
            [0] => 5555555555
            [1] => 5555555555
            [2] => 5555555555
            [3] => 5555555555
            [4] => 5555555555
            [5] => 5555555555
            [6] => 5555555555
            [7] => 5555555555
            [8] => 5555555555
            [9] => 5555555555
        )
)

```

See the [documentation](https://developers.tatango.com/) for more information.