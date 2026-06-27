# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.0] - 2026-06-27

### Added

- Symfony bundle `SymfinityUxBlocksMarketingBundle` — marketing section catalog tier for UX Blocks
- Twenty-two native-first (`nat`) section roles with `blocks.marketing.*` fragment ids:
  - **Landing shells** — `LandingPage`, `HeaderMarketing`, `Footer`, `Banner`, `CookieConsent`
  - **Hero and conversion** — `Hero`, `CtaBand`, `Newsletter`, `PricingSection`, `ComparisonSection`
  - **Social proof and content** — `FeatureSection`, `Testimonials`, `StatsBand`, `LogoCloud`, `Team`, `Faq`, `ContentSection`, `StatusBand`
  - **Layout and navigation** — `BentoGrid`, `FlyoutMenuMarketing` (optional `stl` mega-menu when extended tier is installed)
  - **Utility** — `ErrorPage404`, `IntegrationsSection`
- Optional **motion** props on `Hero`, `StatsBand`, `LogoCloud`, `CtaBand`, and `BentoGrid` — scoped CSS variants with `prefers-reduced-motion` respect
- Role registry in `config/ux_roles.yaml` aligned with the UX Blocks fragment catalog
- Packaged role CSS (`assets/styles/blocks-marketing.css`) for AssetMapper consumers
- Twenty-two `config/component-examples/{role}.yaml` manifests for symfinity-docs handbook SSR
- Flex recipe `0.1` — registers the bundle on all environments
- Consumer handbook under `docs/`: installation, quickstart, configuration, usage, twenty-two component pages, verification, upgrade, and troubleshooting

### Notes

- Explicit opt-in tier — not pulled in by `symfinity/ux-blocks-full` (suggest only)
- Hard dependency on `symfinity/ux-blocks-core` ^0.1
- Optional: `symfinity/ux-blocks-extended` for enhanced flyout dropdown on `FlyoutMenuMarketing`
- PHP **8.2**+; Symfony **7.4** or **8.x**
- Optional: `symfinity/ui-kernel` for themed CSS in production layouts — see handbook quickstart
