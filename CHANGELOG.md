# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.2] - 2026-07-05

### Added

- Handbook [verification.md](docs/verification.md) — P2 integration profile and clean-app smoke (`composer require`, marketing registry markup checks)
- **`integration_profile: P2`** frontmatter on handbook index
- [Configuration — styling without ui-kernel](docs/configuration.md#styling-without-ui-kernel) — inline core + marketing tier stylesheets when Chameleon theme CSS is not installed

### Changed

- **Grouped component examples** — all twenty-two `config/component-examples/*.yaml` manifests use `groups[]` with `slot_twig` for symfinity-docs handbook SSR
- **Role CSS cascade** — committed `blocks-marketing.css` and `BlocksMarketingCssProvider::stylesheet()` wrap tier output in `@layer blocks.marketing` for ui-kernel layer ordering
- **PHPUnit bootstrap** — `tests/bootstrap.php` resolves monorepo or split-mirror Composer autoload; optional `tests/bootstrap.local.php` hook
- Handbook: quickstart documents optional ui-kernel vs inline tier CSS; verification cross-links the no-kernel styling path
- README: quickstart uses correct `Hero` and `CtaBand` prop names

### Notes

- No Twig component props or registry role ids changed — OOTB handbook and CSS cascade hygiene after **v0.1.1**
- Pair with `symfinity/ux-blocks-core` **^0.1.6** (or newer) for automatic inline tier CSS when marketing fragments render
- Upgrading from **0.1.1** needs no config edits; clear Symfony cache if AssetMapper or Twig cached CSS in dev

## [0.1.1] - 2026-06-29

### Added

- **Glass surface** on `Hero` and `ContentSection` — `data-ui-surface="glass"` via core `ResolvesSurfaceSubstrate`; marketing shell CSS with physics-aware hover lift when ui-kernel glass tokens are present
- **Icon watermark** on `Hero` — decorative Lucide watermark via core `ResolvesIconWatermark` (`iconWatermark`, `watermarkPosition` props; default position `top-end`)
- **`ux_blocks_marketing_stylesheet()`** Twig function — renders packaged role CSS for layouts that import marketing styles without an AssetMapper path mapping
- **ROADMAP.md** — public milestone table for the 0.1.x → 1.0.x release line
- **SUPPORTERS.md** and Composer **`funding`** metadata for [GitHub Sponsors](https://github.com/sponsors/serotoninja)
- **`.github/FUNDING.yml`** — GitHub Sponsors link on the split mirror

### Changed

- **Role CSS** — modular SCSS partials for layout sections, FAQ navigation, watermark decoration, and glass marketing shells; refreshed `assets/styles/roles/_bundle.css`
- **Handbook** — twenty-two per-role component guides with props, examples, and cross-links; expanded [quickstart](docs/quickstart.md), [configuration](docs/configuration.md), [verification](docs/verification.md), and [troubleshooting](docs/troubleshooting.md)
- **Split mirror CI** — PHP 8.2–8.5 × Symfony 7.4, 8.0, and 8.1 with PHPUnit and PHPStan on every matrix cell; Composer package cache and `GITHUB_TOKEN` authentication for `symfinity/*` dependencies

### Notes

- Pair with `symfinity/ux-blocks-core` `^0.1.3` (or newer patch) for glass surface and icon watermark traits
- No breaking changes to `blocks.marketing.*` fragment ids or existing Twig props
- Upgrading from **0.1.0** needs no config or template edits unless you adopt `surface`, `iconWatermark`, or the inline stylesheet helper
- Hard-refresh Asset Mapper assets in dev after upgrade if glass shells or watermark decoration look stale

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
