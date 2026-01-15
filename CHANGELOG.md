# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Comprehensive API reference documentation
- Troubleshooting section with common issues and solutions
- Contributing guidelines
- Advanced examples (custom headers, multiple route calls, exception handling)
- Requirements section with PHP version compatibility information
- Known issues section documenting PHP 8.5 deprecation warnings

### Changed
- Improved documentation structure and navigation
- Enhanced examples with more practical use cases
- Synchronized English and Portuguese documentation

### Fixed
- Typo in example code: `$serivce` → `$service`
- Incorrect type documentation: `int $method` → `string $method` in Portuguese documentation

## [v2.1.2] - 2025-04-28

### Changed
- Refactored to maintain REST semantics in the fake server

### Fixed
- Fixed issue with multiple route calls not being tracked correctly

## [v2.1.1] - 2025-03-30

### Changed
- Refactored route handling implementation

### Fixed
- Fixed parameter handling when null values are passed

## [v2.1.0] - 2025-03-29

### Added
- Support for custom HTTP headers in routes (contributed by @ramsey)

## [v2.0.2] - 2025-03-29

### Removed
- Removed Laravel dependency requirement
- Removed Process class

### Added
- Added `.gitattributes` file (contributed by @ramsey)
- Added `.phpunit.cache/` to `.gitignore` (contributed by @ramsey)

## [v2.0.1] - 2025-03-28

### Changed
- Replaced Laravel Http facade with PHP's native `file_get_contents()` using HTTP stream wrapper and stream context for making requests to the local test server (contributed by @ramsey)

## [v2.0.0] - 2025-02-10

### Added
- Support for Laravel 12

## [v1.0.1] - 2022-02-09

### Added
- Support for Laravel 9

## [v1.0.0] - 2021-08-04

### Added
- Additional test coverage

### Changed
- Improved documentation

## [v0.7.0] - 2021-06-17

### Changed
- Renamed `Route::notAllow()` to `Route::notAllowed()` for consistency

### Added
- Tests for all route helper methods (`Route::*`)

## [v0.6.0] - 2021-06-15

### Fixed
- Fixed `Route::delete()` to return HTTP status 204 by default (as per REST conventions)

### Changed
- Methods now return `static` for better method chaining support

## [v0.5.1] - 2021-06-12

### Added
- `__toString()` method implementation for Bypass instances

### Changed
- Minor refactoring improvements

## [v0.5.0] - 2021-06-12

### Added
- `Bypass::serve()` method for creating and serving multiple routes at once
- Route helper methods (`Route::ok()`, `Route::created()`, etc.)

### Changed
- `addRoute()` now accepts both string and array for body parameter

## [v0.4.2] - 2021-06-10

### Added
- Method chaining support for all route methods
- Return type declarations

## [v0.4.1] - 2021-06-06

### Fixed
- Fixed `assertRoutes()` method behavior

### Changed
- Improved documentation

## [v0.4.0] - 2021-06-03

### Changed
- Renamed `addRouteFile()` method to `addFileRoute()` for consistency
- Improved documentation

## [v0.3.0] - 2021-05-29

### Added
- `assertRoutes()` method to verify routes were called expected number of times
- `times` parameter to `addRoute()` and `addFileRoute()` methods (default: 1)

## [v0.2.0] - 2021-05-29

### Added
- `addFileRoute()` method for serving binary file content

### Deprecated
- `expect()` method (will be removed in v1.0.0, use `addRoute()` instead)

### Changed
- Refactored `addRoute()` method implementation

## [v0.1.3] - 2021-05-29

### Changed
- Improved test assertions using `assertSame()`
- Improved documentation

### Removed
- Removed Laravel 5.5 dependency requirement

## [v0.1.2] - 2021-05-28

### Changed
- Renamed `expect()` method to `addRoute()`
- Improved documentation

## [v0.1.1] - 2021-05-26

### Added
- `getBaseUrl()` method to retrieve the Bypass server URL

## [v0.1.0] - 2021-05-25

### Added
- Error message includes route and method when route is not found
- CI/CD integration with GitHub Actions
- Initial test suite

### Changed
- Improved documentation

## [v0.0.6] - 2021-05-22

### Changed
- Improved random port selection algorithm

## [v0.0.5] - 2021-05-22

### Changed
- Improved random port selection algorithm

## [v0.0.4] - 2021-05-22

### Changed
- Improved server path handling using `PHP_BINARY`
- Improved test suite with support for both PHPUnit and Pest

### Fixed
- Fixed test execution issues

### Changed
- Improved documentation

## [v0.0.3] - 2021-05-22

### Added
- Credits section in documentation

### Fixed
- Fixed changelog format
- Fixed version comparison links
- Fixed typo in example code
- Fixed `stop()` method behavior

### Changed
- Improved test suite (removed duplicate service)
- Improved changelog structure

## [v0.0.2] - 2021-05-21

### Added
- Initial changelog
- Documentation and logo
- Test suite

### Changed
- Improved variable naming and configuration clarity

## [v0.0.1] - 2021-05-21

### Added
- Initial release
- Basic Bypass server functionality
- Route management
- Support for standard and file routes

[Unreleased]: https://github.com/ciareis/bypass/compare/v2.1.2...main
[v2.1.2]: https://github.com/ciareis/bypass/compare/v2.1.1...v2.1.2
[v2.1.1]: https://github.com/ciareis/bypass/compare/v2.1.0...v2.1.1
[v2.1.0]: https://github.com/ciareis/bypass/compare/v2.0.2...v2.1.0
[v2.0.2]: https://github.com/ciareis/bypass/compare/v2.0.1...v2.0.2
[v2.0.1]: https://github.com/ciareis/bypass/compare/v2.0.0...v2.0.1
[v2.0.0]: https://github.com/ciareis/bypass/compare/v1.0.1...v2.0.0
[v1.0.1]: https://github.com/ciareis/bypass/compare/v1.0.0...v1.0.1
[v1.0.0]: https://github.com/ciareis/bypass/compare/v0.7.0...v1.0.0
[v0.7.0]: https://github.com/ciareis/bypass/compare/v0.6.0...v0.7.0
[v0.6.0]: https://github.com/ciareis/bypass/compare/v0.5.1...v0.6.0
[v0.5.1]: https://github.com/ciareis/bypass/compare/v0.5.0...v0.5.1
[v0.5.0]: https://github.com/ciareis/bypass/compare/v0.4.2...v0.5.0
[v0.4.2]: https://github.com/ciareis/bypass/compare/v0.4.1...v0.4.2
[v0.4.1]: https://github.com/ciareis/bypass/compare/v0.4.0...v0.4.1
[v0.4.0]: https://github.com/ciareis/bypass/compare/v0.3.0...v0.4.0
[v0.3.0]: https://github.com/ciareis/bypass/compare/v0.2.0...v0.3.0
[v0.2.0]: https://github.com/ciareis/bypass/compare/v0.1.3...v0.2.0
[v0.1.3]: https://github.com/ciareis/bypass/compare/v0.1.2...v0.1.3
[v0.1.2]: https://github.com/ciareis/bypass/compare/v0.1.1...v0.1.2
[v0.1.1]: https://github.com/ciareis/bypass/compare/v0.1.0...v0.1.1
[v0.1.0]: https://github.com/ciareis/bypass/compare/v0.0.6...v0.1.0
[v0.0.6]: https://github.com/ciareis/bypass/compare/v0.0.5...v0.0.6
[v0.0.5]: https://github.com/ciareis/bypass/compare/v0.0.4...v0.0.5
[v0.0.4]: https://github.com/ciareis/bypass/compare/v0.0.3...v0.0.4
[v0.0.3]: https://github.com/ciareis/bypass/compare/v0.0.2...v0.0.3
[v0.0.2]: https://github.com/ciareis/bypass/compare/v0.0.1...v0.0.2
[v0.0.1]: https://github.com/ciareis/bypass/releases/tag/v0.0.1
