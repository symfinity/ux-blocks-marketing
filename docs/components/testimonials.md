# Testimonials

Customer quote grid or carousel shell.

Role `testimonials` · fragment `blocks.marketing.testimonials` · interaction `nat`

## When to use

Use for social proof sections on landing pages.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="testimonials"` and `data-ui-fragment="blocks.marketing.testimonials"`.

**Don't**

- Do not use for product reviews with star ratings — ecommerce tier covers shop patterns.

## Usage

```twig
<twig:Testimonials>
    {% block content %}
        {# Quote cards via composition regions #}
    {% endblock %}
</twig:Testimonials>
```

Variant previews render live from `config/component-examples/testimonials.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Quote text should be associated with author name in markup.

## Related

- [Team](team.md)
- [Logo Cloud](logo-cloud.md)
