# Cta Band

Mid-page call-to-action band with optional motion.

Supports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`.

Role `cta-band` · fragment `blocks.marketing.cta-band` · interaction `nat`

## When to use

Use between content sections to drive signup, demo booking, or secondary conversion.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="cta-band"` and `data-ui-fragment="blocks.marketing.cta-band"`.

**Don't**

- Do not stack multiple CTA bands back-to-back without intervening content.

## Usage

```twig
<twig:CtaBand motion="fade-up">
    {% block content %}
        {# Title, copy, and button group via composition regions #}
    {% endblock %}
</twig:CtaBand>
```

Variant previews render live from `config/component-examples/cta-band.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `motion` | string | none | Entrance motion variant |
| `iconWatermark` | string|null | null | Decorative watermark icon |
| `watermarkPosition` | string|null | null | Watermark placement |

## Accessibility

Primary action must remain keyboard-focusable. Motion disabled under reduced motion.

## Related

- [Hero](hero.md)
- [Banner](banner.md)
