# Quick start

Build a minimal landing section with Hero and CtaBand in a Symfony app with ui-kernel theme CSS.

## Prerequisites

[Installation](installation.md) completed — `symfinity/ux-blocks-core` and `symfinity/ux-blocks-marketing`. Add `symfinity/ui-kernel` for themed apps.

## 1. Include ui-kernel CSS

Marketing role CSS uses `var(--ui-*)` tokens. In your base layout `<head>`:

```twig
{# templates/base.html.twig #}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}My app{% endblock %}</title>
    {{ ui_kernel_theme_boot_script() }}
    {{ ui_kernel_css()|raw }}
    {% block stylesheets %}{% endblock %}
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

## 2. Render marketing sections

Use marketing Twig component tags — fragments use the `blocks.marketing.*` prefix:

```twig
<twig:Hero
    headline="Ship faster"
    subheadline="Composable marketing sections for Symfony."
    primaryActionLabel="Get started"
    primaryActionHref="/signup"
    motion="fade-up"
/>

<twig:CtaBand motion="fade-up">
    {% block content %}
        {# Compose title and buttons via region components #}
    {% endblock %}
</twig:CtaBand>
```

For a full page shell, wrap sections in [LandingPage](components/landing-page.md):

```twig
<twig:LandingPage>
    {% block content %}
        <twig:Hero headline="Welcome" />
        <twig:FeatureSection>{% block content %}{% endblock %}</twig:FeatureSection>
        <twig:Footer>{% block content %}{% endblock %}</twig:Footer>
    {% endblock %}
</twig:LandingPage>
```

## 3. Optional motion

Hero, CtaBand, StatsBand, LogoCloud, and BentoGrid accept a `motion` prop (`none`, `fade-up`, `blur-in`, `gradient-shift`). Animations are disabled when `prefers-reduced-motion: reduce` is active.

## Next steps

- [Components](components.md) — handbook index
- [Hero](components/hero.md) · [Landing page](components/landing-page.md) · [Pricing section](components/pricing-section.md)
- [Usage](usage.md) — composition patterns
- [Verification](verification.md) — clean-app smoke
