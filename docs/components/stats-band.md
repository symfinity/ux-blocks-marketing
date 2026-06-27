# Stats Band

Key metrics row with optional scroll-triggered motion.

Supports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`.

Role `stats-band` · fragment `blocks.marketing.stats-band` · interaction `nat`

## When to use

Use for KPI highlights on landing and status pages.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="stats-band"` and `data-ui-fragment="blocks.marketing.stats-band"`.

**Don't**

- Do not animate counting without reduced-motion fallback.

## Usage

```twig
<twig:StatsBand motion="fade-up">
    {% block content %}
        {# Stat cells via composition #}
    {% endblock %}
</twig:StatsBand>
```

Variant previews render live from `config/component-examples/stats-band.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `motion` | string | none | Scroll/motion variant |
| `iconWatermark` | string|null | null | Decorative watermark |
| `watermarkPosition` | string|null | null | Watermark placement |

## Accessibility

Stat values need text labels. Motion respects reduced motion.

## Related

- [Status Band](status-band.md)
- [Hero](hero.md)
