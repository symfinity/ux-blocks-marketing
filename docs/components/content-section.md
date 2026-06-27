# Content Section

Generic prose or media section with optional glass surface.

Role `content-section` · fragment `blocks.marketing.content-section` · interaction `nat`

## When to use

Use for long-form copy blocks between specialized sections.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="content-section"` and `data-ui-fragment="blocks.marketing.content-section"`.

**Don't**

- Do not nest full landing shells inside content sections.

## Usage

```twig
<twig:ContentSection surface="glass">
    {% block content %}
        {# Prose via Typography region components #}
    {% endblock %}
</twig:ContentSection>
```

Variant previews render live from `config/component-examples/content-section.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `surface` | string | solid | Surface substrate token |

## Accessibility

Prose blocks should use semantic headings in order.

## Related

- [Feature Section](feature-section.md)
- [Banner](banner.md)
