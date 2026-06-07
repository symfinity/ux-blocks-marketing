# Logo Cloud

Role `logo-cloud` · fragment `blocks.marketing.logo-cloud`

## Props

| Prop | Type | Default | Values |
|------|------|---------|--------|
| `motion` | string | `none` | `none`, `marquee`, `stagger-in` |

## Interaction

- `motion="none"` — `nat`
- `motion="marquee"` — `nat` (CSS scroll; pause on hover)
- `motion="stagger-in"` — `nat,stl` (optional in-view helper)

## Reduced motion

Marquee stops; stagger resolves to static logo row.

## Example

```twig
<twig:LogoCloud motion="marquee" />
```
