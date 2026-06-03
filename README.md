# symfinity/ux-blocks-marketing

Chameleon UX Blocks Marketing — **nat** landing-section catalog with `blocks.marketing.*` fragment prefix.

**Planning:** symfinity **026** · **Registry:** [marketing-role-registry](../../../specs/symfinity/symfinity/26-ux-blocks-marketing/contracts/marketing-role-registry.md)

## Install

```bash
composer require symfinity/ux-blocks-marketing
```

Requires Symfony **7.4+**, `symfinity/ux-blocks-core`, `symfony/ux-twig-component` ^2. Does **not** require `symfony/ux-toolkit`, Tailwind npm, or `symfinity/ui-kernel`.

Optional enhanced flyout:

```bash
composer require symfinity/ux-blocks-extended  # suggest only
```

Register the bundle:

```php
// config/bundles.php
Symfinity\UxBlocksMarketing\SymfinityUxBlocksMarketingBundle::class => ['all' => true],
```

## Interaction profile

**V0 marketing sections** — this package ships **composite section components** for landing and campaign pages. Default stories use **`nat` only**: native HTML structure and Chameleon kernel CSS via `[data-ui-role]`. Sections **compose** atomic children from `symfinity/ux-blocks-core` (buttons, typography, cards, fields) and **may** integrate `symfinity/ux-blocks-extended` for enhanced micro-UX (e.g. flyout dropdown). This package **MUST NOT** require package-owned Stimulus for default section renders. Optional **`stl`** applies only to **`flyout-menu-marketing`** when extended dropdown is installed. No **`live`** or **`up`** tokens in v0 marketing atoms.

## Component inventory

| Role | Twig | Category | Interaction | Fragment | Status | REF |
|------|------|----------|-------------|----------|--------|-----|
| `hero` | `Hero` | Marketing | nat | `blocks.marketing.hero` | shipped | Tailwind Plus |
| `feature-section` | `FeatureSection` | Marketing | nat | `blocks.marketing.feature-section` | shipped | Tailwind Plus |
| `cta-band` | `CtaBand` | Marketing | nat | `blocks.marketing.cta-band` | shipped | Tailwind Plus |
| `pricing-section` | `PricingSection` | Marketing | nat | `blocks.marketing.pricing-section` | shipped | Tailwind Plus |
| `landing-page` | `LandingPage` | Marketing | nat | `blocks.marketing.landing-page` | shipped | Workshop compositor |
| `testimonials` | `Testimonials` | Marketing | nat | `blocks.marketing.testimonials` | shipped | Tailwind Plus |
| `newsletter` | `Newsletter` | Marketing | nat | `blocks.marketing.newsletter` | shipped | Tailwind Plus |
| `footer` | `Footer` | Marketing | nat | `blocks.marketing.footer` | shipped | Tailwind Plus |
| `stats-band` | `StatsBand` | Marketing | nat | `blocks.marketing.stats-band` | shipped | Tailwind Plus |
| `logo-cloud` | `LogoCloud` | Marketing | nat | `blocks.marketing.logo-cloud` | shipped | Tailwind Plus |
| `faq` | `Faq` | Marketing | nat | `blocks.marketing.faq` | shipped | Tailwind Plus |
| `team` | `Team` | Marketing | nat | `blocks.marketing.team` | shipped | Tailwind Plus |
| `content-section` | `ContentSection` | Marketing | nat | `blocks.marketing.content-section` | shipped | Tailwind Plus |
| `bento-grid` | `BentoGrid` | Marketing | nat | `blocks.marketing.bento-grid` | shipped | Tailwind Plus |
| `banner` | `Banner` | Marketing | nat | `blocks.marketing.banner` | shipped | Tailwind Plus |
| `header-marketing` | `HeaderMarketing` | Marketing | nat | `blocks.marketing.header-marketing` | shipped | Tailwind Plus |
| `flyout-menu-marketing` | `FlyoutMenuMarketing` | Marketing | nat, stl | `blocks.marketing.flyout-menu-marketing` | shipped | Tailwind Plus + extended dropdown |
| `error-page-404` | `ErrorPage404` | Marketing | nat | `blocks.marketing.error-page-404` | shipped | Tailwind Plus |

## Dogfood

`ux-blocks-demo` exposes **`GET /landing`** when this package is installed — composed `<twig:LandingPage>` with hero, features, pricing, testimonials, and footer.

From org L0 (dogfood hub):

```bash
make dogfood-serve SLUG=ux-blocks-demo
```

## Docs

- [docs/components/](docs/components/) — per-role stubs

## Test

```bash
cd src/symfinity
./bin/php vendor/bin/phpunit packages/ux-blocks-marketing/tests/
```

Extended flyout matrix (optional CI group):

```bash
./bin/php vendor/bin/phpunit packages/ux-blocks-marketing/tests/ --group marketing-extended
```
