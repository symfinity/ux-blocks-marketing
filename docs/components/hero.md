# Hero

Role `hero` · fragment `blocks.marketing.hero`

## Props

| Prop | Type | Default | Values |
|------|------|---------|--------|
| `motion` | string | `none` | `none`, `fade-up`, `blur-in`, `gradient-shift` |

## Interaction

- `motion="none"` — `nat` (026 baseline)
- non-`none` hero variants — `nat,stl` (optional in-view Stimulus)

## Reduced motion

When `prefers-reduced-motion: reduce` is active, entrance animations are disabled and the hero renders in its final static layout.

## Example

```twig
<twig:Hero headline="Launch faster" motion="fade-up" />
```
