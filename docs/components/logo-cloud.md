# Logo Cloud

Partner or customer logo strip with optional motion.

Supports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`.

Role `logo-cloud` · fragment `blocks.marketing.logo-cloud` · interaction `nat`

## When to use

Use below hero or testimonials for trust signals.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="logo-cloud"` and `data-ui-fragment="blocks.marketing.logo-cloud"`.

**Don't**

- Do not use low-contrast logos without accessible alt text.

## Usage

```twig
<twig:LogoCloud motion="fade-up">
    {% block content %}
        {# Logo images via composition #}
    {% endblock %}
</twig:LogoCloud>
```

Variant previews render live from `config/component-examples/logo-cloud.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `motion` | string | none | Entrance motion variant |

## Accessibility

Each logo image requires meaningful `alt` text or `aria-hidden` when decorative.

## Related

- [Integrations Section](integrations-section.md)
- [Testimonials](testimonials.md)
