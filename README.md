# This Laravel package automatically casts your JsonResource data using the casting functions you have defined before.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oguzhankrcb/auto-casting-json-resource.svg?style=flat-square)](https://packagist.org/packages/oguzhankrcb/auto-casting-json-resource)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/oguzhankrcb/auto-casting-json-resource/run-tests?label=tests)](https://github.com/oguzhankrcb/auto-casting-json-resource/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/oguzhankrcb/auto-casting-json-resource/Check%20&%20fix%20styling?label=code%20style)](https://github.com/oguzhankrcb/auto-casting-json-resource/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oguzhankrcb/auto-casting-json-resource.svg?style=flat-square)](https://packagist.org/packages/oguzhankrcb/auto-casting-json-resource)

This package makes easier to add global castings to your `JsonResource` files

## Installation

You can install the package via composer:

```bash
composer require oguzhankrcb/auto-casting-json-resource
```

## Usage

Just add this trait to your `JsonResource`
```php
use AutoCastingJsonResource;
```

And then you can cast whatever you want in `casts` array

```php
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->autoCast(parent::toArray($request));
    }

    public function casts(): array
    {
        return [
            'integer' => fn ($value) => (int) ($value / 100), // It will divide all integer objects with 100
            Money::class => fn (Money $value) => $value->getMinorAmount()->toInt() / 2, // It will cast all Brick\Money\Money objects to integer and divide them with 2
        ];
    }
```

You can exclude columns if you want (`id` column is excluded by default)

```php
    public function excludedColumns(): array
    {
        return [
            'id', // id column will be excluded from castings
        ];
    }
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oğuzhan KARACABAY](https://github.com/oguzhankrcb)
- [Emre Deligöz](https://github.com/deligoez)
- [Turan Karatuğ](https://github.com/tkaratug)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
