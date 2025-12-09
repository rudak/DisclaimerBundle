# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2025-01-09

### Added
- Modern Symfony support (^5.4 || ^6.4 || ^7.0)
- PHP 8.1, 8.2, and 8.3 support with strict types
- PSR-4 autoloading with new namespace structure (`Rudak\DisclaimerBundle`)
- Service autowiring and autoconfiguration
- RGPD 2025 compliant French legal notice template
- Comprehensive GDPR/RGPD documentation including:
  - Data controller identification
  - Purpose and legal basis for processing
  - Data retention periods
  - User rights (access, rectification, erasure, portability, etc.)
  - Cookie policy
  - Right to lodge complaint with CNIL
  - Security measures
  - Post-mortem directives
- Twig extension with `disclaimer_link()` function
- Modern PHP configuration files (services.php, routes.php)
- Configuration class for bundle settings
- GitHub Actions CI workflow
- PHPStan static analysis configuration
- Rector configuration for automated refactoring
- PHPUnit configuration and smoke tests
- Comprehensive README with modern installation instructions
- Template override documentation
- Modern routing with attributes support

### Changed
- **BREAKING**: Minimum PHP version is now 8.1
- **BREAKING**: Minimum Symfony version is now 5.4
- **BREAKING**: Namespace changed from `Rudak\Bundle\DisclaimerBundle` to `Rudak\DisclaimerBundle`
- **BREAKING**: PSR-0 autoloading replaced with PSR-4
- **BREAKING**: Removed Doctrine dependency and database-based content management
- **BREAKING**: Removed admin interface (use template overrides instead)
- **BREAKING**: Routing configuration now uses PHP instead of YAML
- Controller now extends `AbstractController` instead of deprecated `Controller`
- Service configuration migrated from YAML to PHP
- Routing configuration migrated from YAML to PHP
- Template structure simplified and modernized
- License identifier updated to SPDX format (GPL-3.0-or-later)

### Removed
- **BREAKING**: Removed PSR-0 autoloading and `target-dir`
- **BREAKING**: Removed Doctrine dependency
- **BREAKING**: Removed Entity classes (DisclaimerData, DisclaimerDataRepository)
- **BREAKING**: Removed Form classes (DisclaimerDataType)
- **BREAKING**: Removed Model classes (DisclaimerDataModel, DisclaimerDataInterface)
- **BREAKING**: Removed Command classes (CreateCommand)
- **BREAKING**: Removed AdminController and admin routing
- **BREAKING**: Removed DataFixtures
- **BREAKING**: Removed DisclaimerCreator utility
- **BREAKING**: Removed legacy DisclaimerExtension (duplicate)
- Removed database requirement - now uses static templates only
- Removed deprecated Symfony patterns and dependencies
- Removed old YAML service configuration
- Removed old YAML routing configuration
- Removed layout_exemple.md (superseded by README documentation)

### Fixed
- Security vulnerabilities in dependencies by upgrading to modern versions
- Deprecated Symfony patterns replaced with current best practices
- Improved template structure for easier customization
- Better separation of concerns between bundle code and user customization

### Security
- Updated to modern Symfony security practices
- Removed potential SQL injection vectors (no database dependency)
- Added strict type declarations throughout
- Upgraded all dependencies to actively maintained versions

### Documentation
- Complete rewrite of README with modern installation instructions
- Added comprehensive customization guide
- Added RGPD compliance documentation
- Added migration guide from v1.x
- Added code examples for common use cases
- Added configuration reference

### Development
- Added PHPStan level 8 static analysis
- Added Rector for automated code modernization
- Added PHPUnit test infrastructure
- Added GitHub Actions CI pipeline
- Added proper .gitignore for modern PHP projects

## [1.x] - Legacy versions

Previous versions were designed for Symfony 2.x and used PSR-0 autoloading with Doctrine-based content management.
See Git history for details on 1.x releases.

---

## Migration Guide: 1.x → 2.0

### Breaking Changes Summary

1. **PHP & Symfony Requirements**
   - Old: PHP >=5.3.2, Symfony >=2.1
   - New: PHP ^8.1, Symfony ^5.4|^6.4|^7.0

2. **Autoloading**
   - Old: PSR-0 with `target-dir`
   - New: PSR-4 without `target-dir`

3. **Namespace**
   - Old: `Rudak\Bundle\DisclaimerBundle`
   - New: `Rudak\DisclaimerBundle`

4. **Content Management**
   - Old: Database + Doctrine entities + Admin interface
   - New: Template overrides (no database)

5. **Configuration**
   - Old: YAML files
   - New: PHP files

### Migration Steps

1. **Update dependencies**
   ```bash
   composer require rudak/disclaimer-bundle:^2.0
   ```

2. **Update bundle registration** in `config/bundles.php`:
   ```php
   // Old (remove this)
   Rudak\Bundle\DisclaimerBundle\RudakDisclaimerBundle::class => ['all' => true],
   
   // New (add this)
   Rudak\DisclaimerBundle\RudakDisclaimerBundle::class => ['all' => true],
   ```

3. **Update routing** in `config/routes/`:
   ```yaml
   # Old routing import (remove)
   rudak_disclaimer:
       resource: "@RudakDisclaimerBundle/Resources/config/routing.yml"
   
   # New routing import (add)
   rudak_disclaimer:
       resource: '@RudakDisclaimerBundle/Resources/config/routes.php'
       type: php
   ```

4. **Migrate content to templates**
   - Copy your customized content from the database
   - Create `templates/bundles/RudakDisclaimerBundle/disclaimer/page.html.twig`
   - Paste and format your content in the template

5. **Remove database references**
   - Remove DisclaimerData entity from your project
   - Remove any admin routes for disclaimer management
   - Remove any custom code that accessed DisclaimerData

6. **Update any custom code**
   - Update namespace imports from `Rudak\Bundle\DisclaimerBundle` to `Rudak\DisclaimerBundle`
   - Update any controller extensions or service overrides

### Need Help?

If you encounter issues during migration, please [open an issue](https://github.com/rudak/DisclaimerBundle/issues) on GitHub.
