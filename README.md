<div align="center">

# Ux Blocks Marketing

### Symfinity UX Blocks Marketing — nat marketing section catalog with blocks.marketing fragments

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)

<br/>
[![PHPUnit](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml)
[![Coverage](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml)
[![PHPStan](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml)
<br/>
[![Psalm](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml)
[![Infection](https://github.com/symfinity/symfinity/actions/workflows/infection.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/infection.yml)
[![Code Style](https://img.shields.io/badge/code%20style-CS%20Fixer-5c4dbc?style=flat)](https://github.com/symfinity/symfinity/actions/workflows/php-cs-fixer.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-marketing.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-marketing)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-marketing.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-marketing)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

---

## Documentation

| Topic | Page |
|-------|------|
| Components | [docs/components.md](docs/components.md) |
| Configuration | [docs/configuration.md](docs/configuration.md) |
| Index | [docs/index.md](docs/index.md) |
| Installation | [docs/installation.md](docs/installation.md) |
| Quickstart | [docs/quickstart.md](docs/quickstart.md) |
| Reference | [docs/reference.md](docs/reference.md) |
| Troubleshooting | [docs/troubleshooting.md](docs/troubleshooting.md) |
| Upgrade | [docs/upgrade.md](docs/upgrade.md) |
| Usage | [docs/usage.md](docs/usage.md) |
| Component: Banner | [docs/components/banner.md](docs/components/banner.md) |
| Component: Bento Grid | [docs/components/bento-grid.md](docs/components/bento-grid.md) |
| Component: Content Section | [docs/components/content-section.md](docs/components/content-section.md) |
| Component: Cta Band | [docs/components/cta-band.md](docs/components/cta-band.md) |
| Component: Error Page 404 | [docs/components/error-page-404.md](docs/components/error-page-404.md) |
| Component: Faq | [docs/components/faq.md](docs/components/faq.md) |
| Component: Feature Section | [docs/components/feature-section.md](docs/components/feature-section.md) |
| Component: Flyout Menu Marketing | [docs/components/flyout-menu-marketing.md](docs/components/flyout-menu-marketing.md) |
| Component: Footer | [docs/components/footer.md](docs/components/footer.md) |
| Component: Header Marketing | [docs/components/header-marketing.md](docs/components/header-marketing.md) |
| Component: Hero | [docs/components/hero.md](docs/components/hero.md) |
| Component: Landing Page | [docs/components/landing-page.md](docs/components/landing-page.md) |
| Component: Logo Cloud | [docs/components/logo-cloud.md](docs/components/logo-cloud.md) |
| Component: Newsletter | [docs/components/newsletter.md](docs/components/newsletter.md) |
| Component: Pricing Section | [docs/components/pricing-section.md](docs/components/pricing-section.md) |
| Component: Stats Band | [docs/components/stats-band.md](docs/components/stats-band.md) |
| Component: Team | [docs/components/team.md](docs/components/team.md) |
| Component: Testimonials | [docs/components/testimonials.md](docs/components/testimonials.md) |
| Component: Comparison Section | [docs/components/comparison-section.md](docs/components/comparison-section.md) |
| Component: Integrations Section | [docs/components/integrations-section.md](docs/components/integrations-section.md) |
| Component: Cookie Consent | [docs/components/cookie-consent.md](docs/components/cookie-consent.md) |
| Component: Status Band | [docs/components/status-band.md](docs/components/status-band.md) |

## Interaction profile

**V0 marketing sections** — this package ships **composite section components** for landing and campaign pages. Default stories use **`nat` only**: native HTML structure and UI Kernel CSS via `[data-ui-role]`. Sections **compose** atomic children from `symfinity/ux-blocks-core` (buttons, typography, cards, fields) and **may** integrate `symfinity/ux-blocks-extended` for enhanced micro-UX (e.g. flyout dropdown). This package **MUST NOT** require package-owned Stimulus for default section renders. Optional **`stl`** applies only to **`flyout-menu-marketing`** when extended dropdown is installed.

R2 roles (`comparison-section`, `integrations-section`, `cookie-consent`, `status-band`) follow the same **`nat`** composite policy as V0 — no package Stimulus on defaults; motion deferred to future waves.

## Component inventory

**22** shipped marketing section roles — registry schema **1.4** (`config/ux_roles.yaml`, prefix `blocks.marketing`). Sections compose core atoms and universal region components from `symfinity/ux-blocks-core`; no per-concept `Hero*` / `Footer*` sub-component roles.

| Role | Twig | Category | Interaction | Fragment | Status | REF |
|------|------|----------|-------------|----------|--------|-----|
| hero | Hero | Marketing | nat | blocks.marketing.hero | shipped | Tailwind Plus |
| feature-section | FeatureSection | Marketing | nat | blocks.marketing.feature-section | shipped | Tailwind Plus |
| cta-band | CtaBand | Marketing | nat | blocks.marketing.cta-band | shipped | Tailwind Plus |
| pricing-section | PricingSection | Marketing | nat | blocks.marketing.pricing-section | shipped | Tailwind Plus |
| landing-page | LandingPage | Marketing | nat | blocks.marketing.landing-page | shipped | Tailwind Plus |
| testimonials | Testimonials | Marketing | nat | blocks.marketing.testimonials | shipped | Tailwind Plus |
| newsletter | Newsletter | Marketing | nat | blocks.marketing.newsletter | shipped | Tailwind Plus |
| footer | Footer | Marketing | nat | blocks.marketing.footer | shipped | Tailwind Plus |
| stats-band | StatsBand | Marketing | nat | blocks.marketing.stats-band | shipped | Tailwind Plus |
| logo-cloud | LogoCloud | Marketing | nat | blocks.marketing.logo-cloud | shipped | Tailwind Plus |
| faq | Faq | Marketing | nat | blocks.marketing.faq | shipped | Tailwind Plus |
| team | Team | Marketing | nat | blocks.marketing.team | shipped | Tailwind Plus |
| content-section | ContentSection | Marketing | nat | blocks.marketing.content-section | shipped | Tailwind Plus |
| bento-grid | BentoGrid | Marketing | nat | blocks.marketing.bento-grid | shipped | Tailwind Plus |
| banner | Banner | Marketing | nat | blocks.marketing.banner | shipped | Tailwind Plus |
| header-marketing | HeaderMarketing | Marketing | nat | blocks.marketing.header-marketing | shipped | Tailwind Plus |
| flyout-menu-marketing | FlyoutMenuMarketing | Marketing | nat, stl | blocks.marketing.flyout-menu-marketing | shipped | Tailwind Plus |
| error-page-404 | ErrorPage404 | Marketing | nat | blocks.marketing.error-page-404 | shipped | Tailwind Plus |
| comparison-section | ComparisonSection | Marketing | nat | blocks.marketing.comparison-section | shipped | Tailark / Launch UI |
| integrations-section | IntegrationsSection | Marketing | nat | blocks.marketing.integrations-section | shipped | Tailwind Plus partner grid |
| cookie-consent | CookieConsent | Marketing | nat | blocks.marketing.cookie-consent | shipped | Open Policy layout |
| status-band | StatusBand | Marketing | nat | blocks.marketing.status-band | shipped | OpenStatus strip |

## Requirements

- PHP 8.2+
- Symfony 7.4+ (Flex recipe when available)

## Install

**Explicit opt-in** — marketing sections are **never** pulled in by `ux-blocks-full`. Add this package only when you ship landing/campaign pages. See [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles) for the full profile table.

```bash
composer require symfinity/ux-blocks-marketing
```

## Test

```bash
cd src/symfinity
./bin/php vendor/bin/phpunit packages/ux-blocks-marketing/tests/
```

Extended flyout matrix (optional CI group):

```bash
./bin/php vendor/bin/phpunit packages/ux-blocks-marketing/tests/ --group marketing-extended
```

## Motion variants (049)

Optional `motion` prop on `hero`, `stats-band`, `logo-cloud` (required v0.5), plus `cta-band` and `bento-grid` (optional wave). Default `none` preserves **026** renders.

| Role | Interaction (with motion) | `motion` enum |
|------|---------------------------|---------------|
| hero | `nat` / `nat,stl` | `none`, `fade-up`, `blur-in`, `gradient-shift` |
| stats-band | `nat` / `nat,stl` | `none`, `count-up`, `stagger-fade` |
| logo-cloud | `nat` / `nat,stl` | `none`, `marquee`, `stagger-in` |
| cta-band | `nat` | `none`, `pulse-glow`, `slide-in` |
| bento-grid | `nat` / `nat,stl` | `none`, `hover-lift`, `stagger-reveal` |

Import motion styles in the host app: `asset('ux-blocks-marketing/styles/motion/index.css')`. Kernel `--ui-motion-*` tokens are consumed when present; package CSS includes documented fallbacks (Option B until kernel utility PR lands).

## Sass author pipeline (120)

Section layout CSS is authored under `assets/scss/` (partials + `_bundle.scss` `@use` graph) and compiled to `assets/styles/roles/_bundle.css` via `bin/blocks-css-compile`. **Motion variants stay parallel:** hand-maintained CSS under `assets/styles/motion/*.css` is **not** part of the Sass tree — import `assets/styles/motion/index.css` separately in the host app (see table above). Do not move motion files into `assets/scss/` without a spec amend.

```bash
cd src/symfinity
bin/blocks-css-compile --package=ux-blocks-marketing --check
bin/ux-blocks-scss-audit --package=ux-blocks-marketing --check
```


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
