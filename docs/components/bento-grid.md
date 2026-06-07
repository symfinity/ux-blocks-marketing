# Bento Grid

Role `bento-grid` · fragment `blocks.marketing.bento-grid`

## Props

| Prop | Type | Default | Values |
|------|------|---------|--------|
| `motion` | string | `none` | `none`, `hover-lift`, `stagger-reveal` |

## Interaction

- `motion="hover-lift"` — `nat` (CSS `:hover`)
- `motion="stagger-reveal"` — `nat,stl` (optional in-view)

## Reduced motion

Hover lift and stagger reveal fall back to static grid cells.

## Example

```twig
<twig:BentoGrid motion="hover-lift" />
```
