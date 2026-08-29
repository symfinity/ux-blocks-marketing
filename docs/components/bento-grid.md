# Bento Grid

Asymmetric bento layout with optional stagger motion.

Supports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`.

Role `bento-grid` · fragment `blocks.marketing.bento-grid` · interaction `nat`

## When to use

Use for feature showcases with varied tile sizes.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="bento-grid"` and `data-ui-fragment="blocks.marketing.bento-grid"`.

**Don't**

- Do not overload with more than six tiles without responsive testing.

## Usage

```twig
<twig:BentoGrid motion="fade-up">
    {% block content %}
        {# Bento tiles via composition #}
    {% endblock %}
</twig:BentoGrid>
```

Variant previews render live from `config/component-examples/bento-grid.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `motion` | string | none | Stagger motion variant |
| `iconWatermark` | string|null | null | Decorative watermark |
| `watermarkPosition` | string|null | null | Watermark placement |

## Accessibility

Each tile needs a focusable target when interactive. Motion respects reduced motion.

## Related

- [Feature Section](feature-section.md)
- [Hero](hero.md)
