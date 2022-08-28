
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# This Laravel package automatically casts your JsonResource data using the casting functions you have defined before.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oguzhankrcb/auto-casting-json-resource.svg?style=flat-square)](https://packagist.org/packages/oguzhankrcb/auto-casting-json-resource)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/oguzhankrcb/auto-casting-json-resource/run-tests?label=tests)](https://github.com/oguzhankrcb/auto-casting-json-resource/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/oguzhankrcb/auto-casting-json-resource/Check%20&%20fix%20styling?label=code%20style)](https://github.com/oguzhankrcb/auto-casting-json-resource/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oguzhankrcb/auto-casting-json-resource.svg?style=flat-square)](https://packagist.org/packages/oguzhankrcb/auto-casting-json-resource)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/auto-casting-json-resource.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/auto-casting-json-resource)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require oguzhankrcb/auto-casting-json-resource
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="auto-casting-json-resource-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="auto-casting-json-resource-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="auto-casting-json-resource-views"
```

## Usage

```php
$autoCastingJsonResource = new Oguzhankrcb\AutoCastingJsonResource();
echo $autoCastingJsonResource->echoPhrase('Hello, Oguzhankrcb!');
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
