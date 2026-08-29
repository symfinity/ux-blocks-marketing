# Feature Section

Three-up or grid feature highlights using composition-language regions.

Role `feature-section` · fragment `blocks.marketing.feature-section` · interaction `nat`

## When to use

Use for product capability grids on landing pages. Compose with region slots for icon, title, and body per column.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="feature-section"` and `data-ui-fragment="blocks.marketing.feature-section"`.

**Don't**

- Do not pass large prop arrays — use nested region components inside the section shell.

## Usage

```twig
<twig:FeatureSection>
    {% block content %}
        {# Compose with region components — see ux-blocks composition language #}
    {% endblock %}
</twig:FeatureSection>
```

Variant previews render live from `config/component-examples/feature-section.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Section exposes `data-ui-role="feature-section"`. Ensure each feature column has a visible heading.

## Related

- [Content Section](content-section.md)
- [Landing Page](landing-page.md)
