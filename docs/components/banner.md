# Banner

Compact promotional strip for announcements.

Role `banner` · fragment `blocks.marketing.banner` · interaction `nat`

## When to use

Use for site-wide promos above the header or inline alerts.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="banner"` and `data-ui-fragment="blocks.marketing.banner"`.

**Don't**

- Do not replace Hero for primary page messaging.

## Usage

```twig
<twig:Banner>
    {% block content %}
        {# Short promo copy and dismiss control via composition #}
    {% endblock %}
</twig:Banner>
```

Variant previews render live from `config/component-examples/banner.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Dismiss control must be keyboard accessible when present.

## Related

- [Status Band](status-band.md)
- [Cta Band](cta-band.md)
