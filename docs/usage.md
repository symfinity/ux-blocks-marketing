# Usage

Patterns for **symfinity/ux-blocks-marketing** section roles.

## Fragment prefix

All marketing roles emit `data-ui-fragment="blocks.marketing.{role}"` and `data-ui-role="{role}"`. Use these markers in integration tests and design QA.

## Featured components

- **[Hero](components/hero.md)** — primary landing hero with optional motion
- **[Landing page](components/landing-page.md)** — compound page shell
- **[Pricing section](components/pricing-section.md)** — tier cards with feature lists
- **[Cta band](components/cta-band.md)** — mid-page conversion band

## Composition shells

Several roles are **composition shells** (FeatureSection, Footer, Team, …) — supply content via the `content` block and composition-language region components (**108**). Do not expect large prop arrays on these shells.

## Structured data roles

Roles like Faq, PricingSection, ComparisonSection, IntegrationsSection, CookieConsent, and StatusBand accept structured PHP props — see each component page for shape tables.

## Motion overview

| Role | Motion prop |
|------|-------------|
| hero | yes |
| cta-band | yes |
| stats-band | yes |
| logo-cloud | yes |
| bento-grid | yes |

Pass `motion="fade-up"` (or `blur-in`, `gradient-shift`) on supported roles. Default is `none` (static `nat` layout).

## Landing page assembly

Typical vertical stack:

1. [HeaderMarketing](components/header-marketing.md) + [FlyoutMenuMarketing](components/flyout-menu-marketing.md)
2. [Hero](components/hero.md)
3. [LogoCloud](components/logo-cloud.md) or [StatsBand](components/stats-band.md)
4. [FeatureSection](components/feature-section.md) or [BentoGrid](components/bento-grid.md)
5. [PricingSection](components/pricing-section.md) or [ComparisonSection](components/comparison-section.md)
6. [Testimonials](components/testimonials.md) · [Faq](components/faq.md)
7. [Newsletter](components/newsletter.md)
8. [Footer](components/footer.md)

Wrap the stack in [LandingPage](components/landing-page.md) when you want a single compound root.

## Theme CSS

Include UI Kernel theme CSS — see [quick start](quickstart.md) for the boot snippet.

## See also

- [Components](components.md) · [Configuration](configuration.md) · [Troubleshooting](troubleshooting.md)
