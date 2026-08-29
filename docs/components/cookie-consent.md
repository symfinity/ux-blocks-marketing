# Cookie Consent

Cookie banner with category toggles — host app owns persistence.

Role `cookie-consent` · fragment `blocks.marketing.cookie-consent` · interaction `nat`

## When to use

Use for GDPR-style consent on marketing sites.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="cookie-consent"` and `data-ui-fragment="blocks.marketing.cookie-consent"`.

**Don't**

- Do not rely on this bundle for legal compliance storage — wire accept/reject handlers in your app.

## Usage

```twig
<twig:CookieConsent
    headline="We use cookies"
    description="Choose which categories you allow."
    acceptLabel="Accept all"
    :categories="[
        { id: 'necessary', label: 'Necessary', defaultEnabled: true },
        { id: 'analytics', label: 'Analytics' },
    ]"
/>
```

Variant previews render live from `config/component-examples/cookie-consent.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Banner headline |
| `description` | string | '' | Body copy |
| `categories` | array | [] | Consent categories `{ id, label, description?, defaultEnabled? }` |
| `acceptLabel` | string | '' | Accept button label |
| `rejectLabel` | string|null | null | Optional reject label |
| `customizeLabel` | string|null | null | Optional customize label |
| `policyLinks` | array | [] | Policy links `{ label, href }` |

## Accessibility

Banner must not trap focus until user opens customize panel. Toggle switches need labels.

## Related

- [Banner](banner.md)
- [Footer](footer.md)
