# Newsletter

Email capture section with headline and submit label.

Role `newsletter` · fragment `blocks.marketing.newsletter` · interaction `nat`

## When to use

Use for list-building sections at page foot or mid-page.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="newsletter"` and `data-ui-fragment="blocks.marketing.newsletter"`.

**Don't**

- Wire form persistence in your app — this role renders markup only.

## Usage

```twig
<twig:Newsletter headline="Stay in the loop" submitLabel="Subscribe" />
```

Variant previews render live from `config/component-examples/newsletter.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Section headline |
| `submitLabel` | string | Subscribe | Submit button label |

## Accessibility

Email input requires `<label>` or `aria-label`. Announce validation errors from your form layer.

## Related

- [Cta Band](cta-band.md)
- [Footer](footer.md)
