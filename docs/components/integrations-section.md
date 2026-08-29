# Integrations Section

Partner or integration logo grid with descriptions.

Role `integrations-section` · fragment `blocks.marketing.integrations-section` · interaction `nat`

## When to use

Use on product pages listing supported integrations.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="integrations-section"` and `data-ui-fragment="blocks.marketing.integrations-section"`.

**Don't**

- Do not imply partnerships without legal approval.

## Usage

```twig
<twig:IntegrationsSection
    headline="Works with your stack"
    :items="[
        { title: 'Symfony', description: 'First-class bundle', href: 'https://symfony.com' },
    ]"
/>
```

Variant previews render live from `config/component-examples/integrations-section.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Section headline |
| `subheadline` | string | '' | Supporting copy |
| `items` | array | [] | Integration cards `{ title, logoUrl?, description?, href?, category? }` |

## Accessibility

External links should indicate they open a new context when applicable.

## Related

- [Logo Cloud](logo-cloud.md)
- [Feature Section](feature-section.md)
