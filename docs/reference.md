# Reference

## Package identity

| Item | Value |
|------|-------|
| Composer | `symfinity/ux-blocks-marketing` |
| Bundle | `Symfinity\UxBlocksMarketing\SymfinityUxBlocksMarketingBundle` |
| Registry prefix | `blocks.marketing` |
| Role count | 22 |
| Interaction | `nat` (native-first); optional `stl` on flyout with extended |

## Motion contract

Five roles support the `motion` prop per **049**: hero, cta-band, stats-band, logo-cloud, bento-grid. Values: `none`, `fade-up`, `blur-in`, `gradient-shift`.

## Commands

```bash
composer test      # PHPUnit in package root
composer phpstan   # Static analysis
```

In the product monorepo:

```bash
docker compose --env-file .env.docker run --rm -T -w /app php php vendor/bin/phpunit packages/ux-blocks-marketing/tests/
docker compose --env-file .env.docker run --rm -T -w /app php php vendor/bin/phpstan analyse -c packages/ux-blocks-marketing/phpstan.neon.dist
```

## Related packages

| Package | Role |
|---------|------|
| [ux-blocks-core](https://docs.symfinity.dev/ux-blocks-core) | Required — atomic components and tokens |
| [ux-blocks-extended](https://docs.symfinity.dev/ux-blocks-extended) | Optional — enhanced flyout mega-menu |
| [ux-blocks-ecommerce](https://docs.symfinity.dev/ux-blocks-ecommerce) | Shop sections — separate tier |
| [ui-kernel](https://docs.symfinity.dev/ui-kernel) | Optional theme CSS |

## See also

- [Components](components.md)
- [CHANGELOG](../CHANGELOG.md)
