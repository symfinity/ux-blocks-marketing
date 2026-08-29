# Installation

## Prerequisites

1. Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)).
2. Install **ux-blocks-core** — marketing composes core atoms (buttons, typography, layout):

```bash
composer require symfinity/ux-blocks-core
```

3. For **styled** apps, install **ui-kernel** (theme CSS). The registry SDK `symfinity/ux-blocks` is pulled transitively from Packagist.

```bash
composer require symfinity/ui-kernel   # optional — themed apps only
```

4. For enhanced mega-menu flyouts on `FlyoutMenuMarketing`, optionally install extended:

```bash
composer require symfinity/ux-blocks-extended   # optional — stl flyout only
```

## Composer

```bash
composer require symfinity/ux-blocks-marketing
```

## Symfony Flex

The `0.1` recipe applies:

- Registers `SymfinityUxBlocksMarketingBundle` for **all** environments
- No app config file is copied — the bundle auto-configures AssetMapper, Twig paths, and role registry

## Manual installation

When Flex is unavailable:

1. `composer require symfinity/ux-blocks symfinity/ux-blocks-core symfinity/ux-blocks-marketing`
2. Register `Symfinity\UxBlocksMarketing\SymfinityUxBlocksMarketingBundle` in `config/bundles.php`
3. Enable AssetMapper, Stimulus, and UX Twig Component bundles

## Verify installation

```bash
php bin/console debug:container --tag=twig.component | grep -i Hero
php bin/console debug:asset-map | grep ux-blocks-marketing
```

Expect `Hero` and other marketing components in the Twig component list.

## Next steps

[Quick start](quickstart.md) · [Verification](verification.md)
