# Troubleshooting

## Styles look unstyled

Marketing role CSS uses ui-kernel tokens. Install `symfinity/ui-kernel` and include `ui_kernel_css()` in your layout — see [quick start](quickstart.md).

## Flyout menu not enhanced

| Symptom | Check |
|---------|--------|
| Mega-menu panels missing | `enhanced: true` requires `symfinity/ux-blocks-extended` |
| Plain links only | Default `enhanced: false` uses native nav markup |

## Motion not animating

| Symptom | Check |
|---------|--------|
| No entrance animation | Confirm `motion` prop is not `none` on hero/cta/stats/logo/bento |
| Animation always off | User may have `prefers-reduced-motion: reduce` — expected behavior |

## Registry markup missing

Confirm Twig components render with:

- `data-ui-role="{role}"`
- `data-ui-fragment="blocks.marketing.{role}"`

Run `php bin/console debug:container --tag=twig.component | grep Marketing` if components fail to resolve.

## Flex recipe not applied

Ensure `symfinity/recipes` Flex endpoint is configured before `composer require`. Re-run `composer recipes:install symfinity/ux-blocks-marketing` if the bundle is missing from `config/bundles.php`.

## Composer resolution failures

`symfinity/ux-blocks-marketing` requires `symfinity/ux-blocks-core` `^0.1` on Packagist. Tag core before marketing in the same release wave — see package [CHANGELOG](../CHANGELOG.md).

## See also

- [Installation](installation.md)
- [Verification](verification.md)
