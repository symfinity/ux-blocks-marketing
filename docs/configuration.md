# Configuration

UX Blocks Marketing ships **zero required app YAML**. The bundle prepends AssetMapper paths, Twig template paths, and component registration at compile time.

## What the bundle configures

| Concern | Behavior |
|---------|----------|
| AssetMapper | Maps `assets/` to logical namespace `ux-blocks-marketing` |
| Twig templates | Namespace `UxBlocksMarketing` → `templates/` |
| Twig components | `Symfinity\UxBlocksMarketing\Twig\Components\*` → component templates |
| Role registry | `config/ux_roles.yaml` (revision **1.4**) — read-only reference inside the package |
| Services | Autowired listeners — see bundle `config/services.yaml` |

Applications **do not** copy bundle `config/` into `config/packages/`.

## Themed apps (optional ui-kernel)

Role CSS uses `var(--ui-*)` tokens. When **symfinity/ui-kernel** is installed, include theme CSS in your layout — see ui-kernel [theme-preference](https://github.com/symfinity/ui-kernel/blob/main/docs/theme-preference.md).

## Styling without ui-kernel

For smoke tests or minimal apps, inline packaged role CSS in your layout `<head>` (once per page):

```twig
<style id="ux-blocks-core-css">{{ ux_blocks_core_stylesheet()|raw }}</style>
<style id="ux-blocks-marketing-css">{{ ux_blocks_marketing_stylesheet()|raw }}</style>
```

`ux_blocks_marketing_stylesheet()` ships with this package. Core atoms CSS comes from **ux-blocks-core** (transitive). ui-kernel remains optional for full Chameleon theming.

## Motion CSS scope

Motion variants (**049**) apply scoped entrance animations on five roles: hero, cta-band, stats-band, logo-cloud, bento-grid. Motion Stimulus controllers load only when `motion` is not `none`. Reduced-motion media query disables animations globally for these roles.

## Flyout extended tier

`FlyoutMenuMarketing` defaults to native (`nat`) navigation. Set `enhanced: true` only when `symfinity/ux-blocks-extended` is installed — this enables the extended dropdown (`stl`) mega-menu path.

## See also

- [Installation](installation.md)
- [Components](components.md)
- [Troubleshooting](troubleshooting.md)
