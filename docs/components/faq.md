# Faq

Accordion-style FAQ list from structured items.

Role `faq` · fragment `blocks.marketing.faq` · interaction `nat`

## When to use

Use for product questions on landing pages.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="faq"` and `data-ui-fragment="blocks.marketing.faq"`.

**Don't**

- Do not hide critical legal text solely in FAQ accordions.

## Usage

```twig
<twig:Faq :items="[
    { question: 'What is included?', answer: 'All marketing section roles.' },
    { question: 'Does it require ui-kernel?', answer: 'Recommended for themed apps.' },
]" />
```

Variant previews render live from `config/component-examples/faq.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array | [] | List of `{ question, answer }` pairs |

## Accessibility

Questions expose button/disclosure semantics. Answers remain in DOM when collapsed.

## Related

- [Content Section](content-section.md)
- [Pricing Section](pricing-section.md)
