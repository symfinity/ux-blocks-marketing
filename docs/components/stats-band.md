# Stats Band

Role `stats-band` · fragment `blocks.marketing.stats-band`

## Props

| Prop | Type | Default | Values |
|------|------|---------|--------|
| `motion` | string | `none` | `none`, `count-up`, `stagger-fade` |

## Interaction

- `motion="none"` — `nat`
- `motion="count-up"` — `nat,stl` (Stimulus count-up when in viewport)
- `motion="stagger-fade"` — `nat` (CSS stagger)

## Reduced motion

Count-up shows final numeric values immediately. Stagger animations are suppressed.

## Example

```twig
<twig:StatsBand motion="count-up">
    {# Mark stat values with data-marketing-motion-value + Stimulus target in slot content #}
</twig:StatsBand>
```
