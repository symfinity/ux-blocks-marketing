# Upgrade

## 0.1.1

Patch release after [v0.1.0](https://github.com/symfinity/ux-blocks-marketing/releases/tag/v0.1.0). Glass surface and icon watermark on marketing heroes, expanded role CSS and handbook, split-mirror CI, and sponsorship metadata — no fragment id changes.

```bash
composer update symfinity/ux-blocks-marketing symfinity/ux-blocks-core
```

After upgrade:

1. No config or registry migrations — existing `blocks.marketing.*` fragment ids are unchanged.
2. Optional: set `surface="glass"` on `Hero` or `ContentSection`, or `iconWatermark` on `Hero` — see [components/hero.md](components/hero.md).
3. Clear Symfony cache and hard-refresh Asset Mapper assets in dev if section shells look stale.

## 0.1.0 (initial public release)

First Packagist release — twenty-two marketing section roles:

- Hero, FeatureSection, CtaBand, PricingSection, LandingPage
- Testimonials, Newsletter, Footer, StatsBand, LogoCloud
- Faq, Team, ContentSection, BentoGrid, Banner
- HeaderMarketing, FlyoutMenuMarketing, ErrorPage404
- ComparisonSection, IntegrationsSection, CookieConsent, StatusBand

### Requirements

- PHP 8.2+
- Symfony 7.4 or 8.x
- `symfinity/ux-blocks-core` `^0.1`

### Install

```bash
composer require symfinity/ux-blocks-marketing
```

See [Installation](installation.md) for Flex recipe and optional extended flyout.

## Unreleased monorepo consumers

Path-repo installs from `symfinity/symfinity` may use `@dev` constraints until split tags land — track [CHANGELOG](../CHANGELOG.md).
