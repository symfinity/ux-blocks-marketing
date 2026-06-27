# Pricing Section

Tiered pricing cards with feature lists.

Role `pricing-section` · fragment `blocks.marketing.pricing-section` · interaction `nat`

## When to use

Use on SaaS landing pages when plan comparison belongs in the marketing flow.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="pricing-section"` and `data-ui-fragment="blocks.marketing.pricing-section"`.

**Don't**

- Do not use for checkout — pair with ecommerce tier when **130** ships.

## Usage

```twig
<twig:PricingSection :tiers="[
    { name: 'Starter', price: '$9/mo', features: ['All sections', 'Email support'] },
    { name: 'Pro', price: '$29/mo', features: ['Priority support'], highlighted: true },
]" />
```

Variant previews render live from `config/component-examples/pricing-section.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `tiers` | array | [] | List of `{ name, price, features?, highlighted? }` tier objects |

## Accessibility

Highlighted tier must not rely on colour alone — use `highlighted` for structural emphasis.

## Related

- [Comparison Section](comparison-section.md)
- [Cta Band](cta-band.md)
