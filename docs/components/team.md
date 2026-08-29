# Team

Team member grid shell.

Role `team` · fragment `blocks.marketing.team` · interaction `nat`

## When to use

Use on about pages and hiring landing sections.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="team"` and `data-ui-fragment="blocks.marketing.team"`.

**Don't**

- Do not use for user avatars in app UI — use core Avatar.

## Usage

```twig
<twig:Team>
    {% block content %}
        {# Member cards via composition #}
    {% endblock %}
</twig:Team>
```

Variant previews render live from `config/component-examples/team.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Member photos need alt text with person name.

## Related

- [Testimonials](testimonials.md)
- [Content Section](content-section.md)
