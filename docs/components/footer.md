# Footer

Site footer shell with link columns and legal slots.

Role `footer` · fragment `blocks.marketing.footer` · interaction `nat`

## When to use

Use once per marketing layout for navigation and legal links.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="footer"` and `data-ui-fragment="blocks.marketing.footer"`.

**Don't**

- Do not use inside cards or modals.

## Usage

```twig
<twig:Footer>
    {% block content %}
        {# Link groups via composition regions #}
    {% endblock %}
</twig:Footer>
```

Variant previews render live from `config/component-examples/footer.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Footer landmark uses `<footer>` semantics. Link groups need visible headings.

## Related

- [Header Marketing](header-marketing.md)
- [Landing Page](landing-page.md)
