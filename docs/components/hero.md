# Hero

Primary landing hero with headline, actions, optional media, and optional entrance motion.

Supports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`.

Role `hero` · fragment `blocks.marketing.hero` · interaction `nat`

## When to use

Use **Hero** as the first section on marketing and campaign pages. For compact promotional strips, use [Banner](banner.md) or [CtaBand](cta-band.md).

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="hero"` and `data-ui-fragment="blocks.marketing.hero"`.

**Don't**

- Do not use for in-app page headers — prefer core [PageHeading](../ux-blocks-core/components/page-heading.md) from **ux-blocks-core**.

## Usage

```twig
<twig:Hero
    headline="Ship faster"
    subheadline="Composable marketing sections for Symfony apps."
    badge="New"
    primaryActionLabel="Get started"
    primaryActionHref="/signup"
    motion="fade-up"
/>
```

Variant previews render live from `config/component-examples/hero.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Primary heading text |
| `subheadline` | string | '' | Supporting copy below the headline |
| `badge` | string | '' | Optional eyebrow badge above the headline |
| `primaryActionLabel` | string|null | null | Primary CTA label |
| `primaryActionHref` | string|null | null | Primary CTA href |
| `secondaryActionLabel` | string|null | null | Secondary CTA label |
| `secondaryActionHref` | string|null | null | Secondary CTA href |
| `mediaUrl` | string|null | null | Optional hero media URL |
| `motion` | string | none | Entrance motion: `none`, `fade-up`, `blur-in`, `gradient-shift` |
| `surface` | string | solid | Surface substrate: `solid`, `glass`, … |
| `iconWatermark` | string|null | null | Decorative icon watermark id |
| `watermarkPosition` | string|null | null | Watermark position when iconWatermark is set |

## Accessibility

Headline renders as a single logical heading. Action links use core Button semantics. Motion respects `prefers-reduced-motion`.

## Related

- [Cta Band](cta-band.md)
- [Landing Page](landing-page.md)
