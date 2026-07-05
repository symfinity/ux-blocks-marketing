# Verification

**Integration profile:** P2 — embed (22 marketing section Twig tags).

Checks after installing **symfinity/ux-blocks-marketing** in a Symfony app.

## Local commands

```bash
composer test
composer phpstan
php bin/console debug:container --tag=twig.component | grep Hero
```

## Browser or WebTestCase

Render a page with a marketing component and confirm registry markup:

- `data-ui-role="hero"` (or matching role)
- `data-ui-fragment="blocks.marketing.hero"`

## Clean-app smoke

On a fresh Symfony 7.4+ project with the symfinity/recipes Flex endpoint:

```bash
composer require symfinity/ux-blocks-core symfinity/ux-blocks-marketing
```

Add ui-kernel theme CSS to your layout (recommended), **or** inline tier stylesheets — see [Configuration](configuration.md#styling-without-ui-kernel). Then render:

```twig
<twig:Hero headline="Welcome" primaryActionLabel="Get started" primaryActionHref="/signup" />
```

Load the page — expect HTTP 200 and `blocks.marketing.hero` in the response body.

## Handbook SSR (symfinity-docs)

When `symfinity/symfinity-docs` is installed, component previews resolve from `config/component-examples/*.yaml`. Spot-check:

```bash
curl -sI http://127.0.0.1:<port>/ux-blocks-marketing/components/hero | grep '200'
```

## See also

- [Quickstart](quickstart.md)
- [Troubleshooting](troubleshooting.md)
- [CHANGELOG](../CHANGELOG.md)
