# Flyout Menu Marketing

Marketing navigation with optional enhanced mega-menu (extended tier).

Role `flyout-menu-marketing` · fragment `blocks.marketing.flyout-menu-marketing` · interaction `nat`

## When to use

Use in HeaderMarketing for multi-level site navigation.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="flyout-menu-marketing"` and `data-ui-fragment="blocks.marketing.flyout-menu-marketing"`.

**Don't**

- Do not enable `enhanced` without `symfinity/ux-blocks-extended` installed.

## Usage

```twig
<twig:FlyoutMenuMarketing :enhanced="false" :items="[
    { label: 'Product', href: '/product' },
    { label: 'Resources', href: '/docs', children: [
        { label: 'Handbook', href: '/docs' },
    ]},
]" />
```

Variant previews render live from `config/component-examples/flyout-menu-marketing.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `enhanced` | bool | false | Use extended dropdown (stl) when true |
| `items` | array | [] | Nav tree `{ label, href, children? }` |

## Accessibility

Flyout triggers need `aria-expanded`. Mega-menu panels trap focus when open (extended tier).

## Related

- [Header Marketing](header-marketing.md)
