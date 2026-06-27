<div align="center">

# UX Blocks Marketing

### Landing and campaign section components

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![CI](https://github.com/symfinity/ux-blocks-marketing/actions/workflows/ci.yml/badge.svg)](https://github.com/symfinity/ux-blocks-marketing/actions/workflows/ci.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-marketing.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-marketing)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-marketing.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-marketing)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!NOTE]
> **Read-only mirror.**
> See [CONTRIBUTING.md](CONTRIBUTING.md) for how to propose changes.

## Features

- **22 marketing section roles** — hero, pricing, footer, newsletter, and landing page shells
- **Native-first (`nat`)** — composes core atoms; optional Stimulus only on flyout menu
- **Registry-aligned** — `blocks.marketing.*` fragment ids
- **Explicit opt-in tier** — never pulled in by `symfinity/ux-blocks-full`
- **Optional motion props** — hero, stats, logo cloud, CTA, and bento stagger variants

## Interaction profile

| Token | In this package |
|-------|-----------------|
| `nat` | Default for all section roles |
| `stl` | Optional on `FlyoutMenuMarketing` when extended dropdown is installed |

## Component inventory


<!-- ux-blocks:registry:start -->
| Role | Twig | Interaction | Fragment | Status |
|------|------|-------------|----------|--------|
| hero | Hero | nat | `blocks.marketing.hero` | shipped |
| feature-section | FeatureSection | nat | `blocks.marketing.feature-section` | shipped |
| cta-band | CtaBand | nat | `blocks.marketing.cta-band` | shipped |
| pricing-section | PricingSection | nat | `blocks.marketing.pricing-section` | shipped |
| landing-page | LandingPage | nat | `blocks.marketing.landing-page` | shipped |
| testimonials | Testimonials | nat | `blocks.marketing.testimonials` | shipped |
| newsletter | Newsletter | nat | `blocks.marketing.newsletter` | shipped |
| footer | Footer | nat | `blocks.marketing.footer` | shipped |
| stats-band | StatsBand | nat | `blocks.marketing.stats-band` | shipped |
| logo-cloud | LogoCloud | nat | `blocks.marketing.logo-cloud` | shipped |
| faq | Faq | nat | `blocks.marketing.faq` | shipped |
| team | Team | nat | `blocks.marketing.team` | shipped |
| content-section | ContentSection | nat | `blocks.marketing.content-section` | shipped |
| bento-grid | BentoGrid | nat | `blocks.marketing.bento-grid` | shipped |
| banner | Banner | nat | `blocks.marketing.banner` | shipped |
| header-marketing | HeaderMarketing | nat | `blocks.marketing.header-marketing` | shipped |
| flyout-menu-marketing | FlyoutMenuMarketing | nat, stl | `blocks.marketing.flyout-menu-marketing` | shipped |
| error-page-404 | ErrorPage404 | nat | `blocks.marketing.error-page-404` | shipped |
| comparison-section | ComparisonSection | nat | `blocks.marketing.comparison-section` | shipped |
| integrations-section | IntegrationsSection | nat | `blocks.marketing.integrations-section` | shipped |
| cookie-consent | CookieConsent | nat | `blocks.marketing.cookie-consent` | shipped |
| status-band | StatusBand | nat | `blocks.marketing.status-band` | shipped |
<!-- ux-blocks:registry:end -->

**Highlights:** full landing page compound; comparison and integrations sections; cookie consent banner.

Handbook: [docs/components.md](docs/components.md).

## Prerequisites

Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)) — recipes are not in Symfony's official recipe repository yet.

## Installation

**Explicit opt-in** — add only when you ship landing or campaign pages.

```bash
composer require symfinity/ux-blocks-marketing
```

See [Installation](docs/installation.md).

## Quick Start

```twig
<twig:Hero title="Ship faster" subtitle="Composable sections for Symfony apps." />
<twig:CtaBand title="Get started" href="/signup" />
```

See [Quick start](docs/quickstart.md) for the full walkthrough.

## Documentation

- **[Quick start](docs/quickstart.md)** — minimal setup path
- **[Installation](docs/installation.md)** — Flex, dependencies, verify
- **[Configuration](docs/configuration.md)** — bundle and app options
- **[Components](docs/components.md)** — role index and examples
- **[Usage](docs/usage.md)** — day-to-day patterns
- **[Upgrade](docs/upgrade.md)** — version migrations

## Requirements

- PHP 8.2 or higher
- Symfony 7.4 or 8.x
- `symfinity/ux-blocks-core` ^0.1

## Support

- [GitHub Issues](https://github.com/symfinity/ux-blocks-marketing/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License

[MIT](LICENSE)
