# Release Notes

## [Unreleased](https://github.com/ciareis/bypass/compare/v2.1.1...main)

- Refactored to maintain REST semantics in the fake server.

## [v2.1.1 (2025-03-30)](https://github.com/ciareis/bypass/archive/refs/tags/v2.1.1.zip)

- refactor of routes
- fix parameter with null

## [v2.1.0 (2025-03-29)](https://github.com/ciareis/bypass/archive/refs/tags/v2.1.0.zip)

- add headers to faker by @ramsey

## [v2.0.2 (2025-03-29)](https://github.com/ciareis/bypass/archive/refs/tags/v2.0.2.zip)
- remove laravel depends

- Add .gitattributes and ignore .phpunit.cache/ by @ramsey

- remove Process class

## [v2.0.1 (2025-03-28)](https://github.com/ciareis/bypass/archive/refs/tags/v2.0.1.zip)

- Instead of using the Laravel Http facade, this PR uses PHP's file_get_contents() with the HTTP stream wrapper and a stream context to make requests to the local test server.

thanks for @ramsey

## [v2.0.0 (2025-02-10)](https://github.com/ciareis/bypass/archive/refs/tags/v2.0.0.zip)

- added support to laravel 12

## [v1.0.1 (2022-02-09)](https://github.com/ciareis/bypass/archive/refs/tags/v1.0.1.zip)

- added support to laravel 9

## [v1.0.0 (2021-08-04)](https://github.com/ciareis/bypass/archive/refs/tags/v1.0.0.zip)

- improves doc
- added more tests

## [v0.7.0 (2021-06-17)](https://github.com/ciareis/bypass/archive/refs/tags/v0.7.0.zip)

- change Route::notAllow to Route::notAllowed
- added tests to route::*

## [v0.6.0 (2021-06-15)](https://github.com/ciareis/bypass/archive/refs/tags/v0.6.0.zip)

- broken Route::delete, it returns 204 for default
- bypass return new static

## [v0.5.1 (2021-06-12)](https://github.com/ciareis/bypass/archive/refs/tags/v0.5.1.zip)

- added toString
- a letter refactoring 

## [v0.5.0 (2021-06-12)](https://github.com/ciareis/bypass/archive/refs/tags/v0.5.0.zip)

- added Bypass::serve with helpers route
- addRoute now accept string and array in body 

## [v0.4.2 (2021-06-10)](https://github.com/ciareis/bypass/archive/refs/tags/v0.4.2.zip)

- added chain to methods
- added return type

## [v0.4.1 (2021-06-06)](https://github.com/ciareis/bypass/archive/refs/tags/v0.4.1.zip)

- Fix assertRoutes
- Improves doc

## [v0.4.0 (2021-06-03)](https://github.com/ciareis/bypass/archive/refs/tags/v0.4.0.zip)

- Improves doc
- Rename addRouteFile method to AddFileRoute

## [v0.3.0 (2021-05-29)](https://github.com/ciareis/bypass/archive/refs/tags/v0.3.0.zip)

- added assertRoute, it returns an exception if the defined routes are not called for the expected number of times.
- added times params, default is 1

## [v0.2.0 (2021-05-29)](https://github.com/ciareis/bypass/archive/refs/tags/v0.2.0.zip)

- added addRouteFile
- deprecated method except, it will removes version 1.0.0
- refactoring addRoute

## [v0.1.3 (2021-05-29)](https://github.com/ciareis/bypass/archive/refs/tags/v0.1.3.zip)

- improves doc
- remove laravel 5.5 depends
- improves tests with assertSame

## [v0.1.2 (2021-05-28)](https://github.com/ciareis/bypass/archive/refs/tags/v0.1.2.zip)

- added rename method expect to addRoute
- improves doc

## [v0.1.1 (2021-05-26)](https://github.com/ciareis/bypass/archive/refs/tags/v0.1.1.zip)

- added method getBaseUrl

## [v0.1.0 (2021-05-25)](https://github.com/ciareis/bypass/archive/refs/tags/v0.1.0.zip)

- added route and method at string when route not exists
- added CI/test to github
- improves doc

## [v0.0.6 (2021-05-22)](https://github.com/ciareis/bypass/archive/refs/tags/v0.0.6.zip)

- improves random port

## [v0.0.5 (2021-05-22)](https://github.com/ciareis/bypass/archive/refs/tags/0.0.5.zip)

- improves random port
## [v0.0.4 (2021-05-22)](https://github.com/ciareis/bypass/archive/refs/tags/0.0.4.zip)

- Improves path with PHP_BINARY
- fixed tests and repeat test with phpunit and phppest
- improves doc

## [v0.0.3 (2021-05-22)](https://github.com/ciareis/bypass/archive/refs/tags/0.0.3.zip)

- Improves changelog
- fixed link to compare version
- Improves tests removed duplicate service
- fixed: typo example
- added credits
- fixed stop method

## [v0.0.2 (2021-05-21)](https://github.com/ciareis/bypass/archive/refs/tags/0.0.2.zip)

- Started changelog
- Added Doc and Logo
- Clearer variable name and config
- Improves tests

## [v0.0.1](https://github.com/ciareis/bypass/archive/refs/tags/0.0.1.zip)

- First functional proposal
