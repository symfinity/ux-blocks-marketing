# Comparison Section

Feature comparison matrix across plan columns.

Role `comparison-section` · fragment `blocks.marketing.comparison-section` · interaction `nat`

## When to use

Use when pricing alone is insufficient for plan differentiation.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="comparison-section"` and `data-ui-fragment="blocks.marketing.comparison-section"`.

**Don't**

- Do not embed checkout buttons inside the matrix — link to pricing CTAs.

## Usage

```twig
<twig:ComparisonSection
    headline="Compare plans"
    :columns="[{ label: 'Starter' }, { label: 'Pro', highlighted: true }]"
    :rows="[
        { feature: 'Sections', cells: [{ value: 'All' }, { value: 'All' }] },
    ]"
/>
```

Variant previews render live from `config/component-examples/comparison-section.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Section headline |
| `subheadline` | string | '' | Supporting copy |
| `columns` | array | [] | Column headers `{ label, highlighted? }` |
| `rows` | array | [] | Rows `{ feature, cells: [{ value, emphasized? }] }` |

## Accessibility

Use `<table>` semantics or grid roles with header cells for screen readers.

## Related

- [Pricing Section](pricing-section.md)
