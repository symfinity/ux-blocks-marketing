# Landing Page

Compound page shell composing hero, features, pricing, and footer sections.

Role `landing-page` · fragment `blocks.marketing.landing-page` · interaction `nat`

## When to use

Use as the outer layout when building full marketing pages from marketing tier sections.

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="landing-page"` and `data-ui-fragment="blocks.marketing.landing-page"`.

**Don't**

- Do not nest another LandingPage inside itself.

## Usage

```twig
<twig:LandingPage>
    {% block content %}
        <twig:Hero headline="Welcome" />
        <twig:FeatureSection>{% block content %}{% endblock %}</twig:FeatureSection>
        <twig:Footer>{% block content %}{% endblock %}</twig:Footer>
    {% endblock %}
</twig:LandingPage>
```

Variant previews render live from `config/component-examples/landing-page.yaml`.

## API Reference

This role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.

## Accessibility

Ensure a single logical `h1` within the composed page — typically from Hero.

## Related

- [Hero](hero.md)
- [Footer](footer.md)
