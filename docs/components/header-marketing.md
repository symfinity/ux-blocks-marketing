# Header Marketing

Marketing site header shell with nav slots.

Role `header-marketing` · fragment `blocks.marketing.header-marketing` · interaction `nat`

## When to use

Use as top chrome on landing layouts.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="header-marketing"` and `data-ui-fragment="blocks.marketing.header-marketing"`.

**Don't**

- Do not use for authenticated app nav — use core Navbar patterns.

## Usage

```twig
<twig:HeaderMarketing>
    {% block content %}
        {# Logo and nav links via composition #}
    {% endblock %}
</twig:HeaderMarketing>
```

Variant previews render live from `config/component-examples/header-marketing.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Nav landmark with skip link recommended in host layout.

## Related

- [Flyout Menu Marketing](flyout-menu-marketing.md)
- [Footer](footer.md)
