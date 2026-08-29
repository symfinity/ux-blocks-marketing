# Error Page 404

Marketing-styled not-found page section.

Role `error-page-404` · fragment `blocks.marketing.error-page-404` · interaction `nat`

## When to use

Use in Symfony error templates for public marketing sites.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="error-page-404"` and `data-ui-fragment="blocks.marketing.error-page-404"`.

**Don't**

- Do not use for API JSON 404 responses.

## Usage

```twig
<twig:ErrorPage404 headline="Page not found" message="Sorry, we could not find that page." />
```

Variant previews render live from `config/component-examples/error-page-404.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | Page not found | Error headline |
| `message` | string | Sorry, we could not find that page. | Supporting message |

## Accessibility

Headline should be the page `h1` in error layout.

## Related

- [Hero](hero.md)
- [Cta Band](cta-band.md)
