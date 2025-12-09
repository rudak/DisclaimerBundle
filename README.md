# DisclaimerBundle

[![CI](https://github.com/rudak/DisclaimerBundle/workflows/CI/badge.svg)](https://github.com/rudak/DisclaimerBundle/actions)

Modern Symfony Bundle for French Legal Notices (Mentions Légales) with RGPD 2025 compliance.

## Features

- 🇫🇷 **RGPD 2025 compliant** French legal notice template
- ⚡ **Modern Symfony** support (^5.4 || ^6.4 || ^7.0)
- 🐘 **PHP 8.1+** with strict types and modern features
- 🎨 **Twig-only** rendering with customizable templates
- 🔧 **PSR-4** autoloading with autowire/autoconfigure
- 🧪 **Quality tools**: PHPStan, Rector, PHPUnit
- 📦 **Easy to customize** and extend

## Requirements

- PHP ^8.1 || ^8.2 || ^8.3
- Symfony ^5.4 || ^6.4 || ^7.0

## Installation

### 1. Install the bundle via Composer

```bash
composer require rudak/disclaimer-bundle
```

### 2. Enable the bundle

If you're not using Symfony Flex, add the bundle to your `config/bundles.php`:

```php
return [
    // ...
    Rudak\DisclaimerBundle\RudakDisclaimerBundle::class => ['all' => true],
];
```

### 3. Import the routes

Create or update `config/routes/rudak_disclaimer.yaml`:

```yaml
rudak_disclaimer:
    resource: '@RudakDisclaimerBundle/Resources/config/routes.php'
    type: php
```

Or if you prefer PHP configuration in `config/routes.php`:

```php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->import('@RudakDisclaimerBundle/Resources/config/routes.php');
};
```

## Usage

### Access the disclaimer page

Once installed, the disclaimer page is available at:

```
https://your-domain.com/disclaimer
```

### Add a link in your templates

Use the Twig function to add a link to the disclaimer page:

```twig
{{ disclaimer_link() }}
{# Outputs: <a href="/disclaimer">Mentions légales</a> #}

{{ disclaimer_link('Legal Notice') }}
{# Outputs: <a href="/disclaimer">Legal Notice</a> #}

{{ disclaimer_link('Mentions légales', { class: 'footer-link', target: '_blank' }) }}
{# Outputs: <a href="/disclaimer" class="footer-link" target="_blank">Mentions légales</a> #}
```

## Customization

### Override the disclaimer template

The bundle provides a default RGPD 2025 compliant template, but you can easily override it:

1. Create a file at `templates/bundles/RudakDisclaimerBundle/disclaimer/page.html.twig`
2. Customize the content according to your needs

Example override:

```twig
{% extends '@RudakDisclaimer/disclaimer/layout.html.twig' %}

{% block title %}Our Legal Notice{% endblock %}

{% block disclaimer_content %}
<div class="disclaimer-content">
    <h1>Legal Notice</h1>
    <p>Your custom content here...</p>
    
    {# You can also extend the original template #}
    {{ parent() }}
</div>
{% endblock %}
```

### Override the layout

To integrate the disclaimer with your site's design, override the layout:

Create `templates/bundles/RudakDisclaimerBundle/disclaimer/layout.html.twig`:

```twig
{% extends 'base.html.twig' %}

{% block body %}
    {% block disclaimer_content %}{% endblock %}
{% endblock %}
```

### Customize the controller

If you need more control, you can extend or replace the controller:

```php
namespace App\Controller;

use Rudak\DisclaimerBundle\Controller\DisclaimerController as BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomDisclaimerController extends BaseController
{
    #[Route('/legal', name: 'app_disclaimer')]
    public function show(): Response
    {
        // Add custom logic here
        return $this->render('@RudakDisclaimer/disclaimer/page.html.twig', [
            'custom_var' => 'value',
        ]);
    }
}
```

## RGPD Compliance

The default template includes:

- ✅ Data controller identification
- ✅ Purpose and legal basis for data processing
- ✅ Data retention periods
- ✅ User rights (access, rectification, erasure, portability, etc.)
- ✅ Cookie policy
- ✅ Right to lodge a complaint with CNIL
- ✅ Security measures
- ✅ Post-mortem directives

**Important**: You must customize the template with your actual information:
- Company/organization details
- Hosting provider information
- Specific data processing activities
- Contact information for GDPR requests

## Development

### Running tests

```bash
composer test
```

### Static analysis

```bash
composer phpstan
```

### Code quality

```bash
composer rector
```

## Upgrade from v1.x

This version 2.0 is a complete rewrite with breaking changes:

- **PHP requirement**: Now requires PHP 8.1+
- **Symfony requirement**: Now requires Symfony 5.4+
- **PSR-4 autoloading**: Namespace changed from `Rudak\Bundle\DisclaimerBundle` to `Rudak\DisclaimerBundle`
- **No Doctrine dependency**: Simplified to static templates only
- **Modern routing**: Uses PHP config instead of YAML
- **No admin interface**: Removed legacy admin controller (use template overrides instead)

### Migration steps:

1. Update your composer.json requirements
2. Update bundle registration in `config/bundles.php`
3. Update route imports to use PHP config
4. Override templates instead of managing data via admin interface
5. Remove any Doctrine entity references

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This bundle is released under the GPL-3.0-or-later license. See the [LICENSE](LICENSE) file for details.

## Credits

- **Original Author**: [Kadur Arnaud](https://github.com/rudak)
- Modernized for Symfony 5.4+ / 6.4+ / 7.0+ and PHP 8.1+

## Support

For issues, questions, or suggestions, please use the [GitHub issue tracker](https://github.com/rudak/DisclaimerBundle/issues).
