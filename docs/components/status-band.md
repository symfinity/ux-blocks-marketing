# Status Band

Operational status strip with tone and metrics.

Role `status-band` · fragment `blocks.marketing.status-band` · interaction `nat`

## When to use

Use on status or trust pages summarizing uptime.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="status-band"` and `data-ui-fragment="blocks.marketing.status-band"`.

**Don't**

- Do not poll live status from this component — pass data from your status service.

## Usage

```twig
<twig:StatusBand
    headline="All systems operational"
    statusTone="operational"
    uptimeLabel="99.9% uptime"
    :metrics="[{ label: 'API', value: 'Operational' }]"
/>
```

Variant previews render live from `config/component-examples/status-band.yaml`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `headline` | string | '' | Status headline |
| `statusTone` | string | operational | Tone token: operational, degraded, outage, … |
| `uptimeLabel` | string|null | null | Optional uptime summary |
| `incidentUrl` | string|null | null | Link to incident details |
| `lastUpdated` | string|null | null | Human-readable last updated stamp |
| `metrics` | array | [] | Metric rows `{ label, value }` |

## Accessibility

Status tone must include text label, not colour alone.

## Related

- [Stats Band](stats-band.md)
- [Banner](banner.md)
