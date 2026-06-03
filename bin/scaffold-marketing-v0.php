<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$src = $root . '/src/Twig/Components';
$tpl = $root . '/templates/components';
$docs = $root . '/docs/components';

function writeFile(string $path, string $content): void
{
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    file_put_contents($path, $content);
    echo "wrote {$path}\n";
}

function sectionPhp(string $class, string $twig, string $extraProps = ''): string
{
    return <<<PHP
<?php

declare(strict_types=1);

namespace Symfinity\\UxBlocksMarketing\\Twig\\Components;

use Symfony\\UX\\TwigComponent\\Attribute\\AsTwigComponent;

#[AsTwigComponent('{$twig}', template: '@UxBlocksMarketing/components/{$class}.html.twig')]
final class {$class}
{
{$extraProps}
}

PHP;
}

function sectionTwig(string $role, string $tag = 'section'): string
{
    return <<<TWIG
<{$tag}
    data-ui-role="{$role}"
    data-ui-fragment="blocks.marketing.{$role}"
    {{ attributes }}
>
    {% block content %}{% endblock %}
</{$tag}>
TWIG;
}

$simple = [
    'feature-section' => 'FeatureSection',
    'cta-band' => 'CtaBand',
    'testimonials' => 'Testimonials',
    'footer' => 'Footer',
    'stats-band' => 'StatsBand',
    'logo-cloud' => 'LogoCloud',
    'team' => 'Team',
    'content-section' => 'ContentSection',
    'bento-grid' => 'BentoGrid',
    'banner' => 'Banner',
    'header-marketing' => 'HeaderMarketing',
];

foreach ($simple as $role => $class) {
    writeFile("{$src}/{$class}.php", sectionPhp($class, $class));
    writeFile("{$tpl}/{$class}.html.twig", sectionTwig($role));
}

writeFile("{$src}/Hero.php", sectionPhp('Hero', 'Hero', <<<'PHP'
    public string $headline = '';

    public string $subheadline = '';

    public string $badge = '';

    public ?string $primaryActionLabel = null;

    public ?string $primaryActionHref = null;

    public ?string $secondaryActionLabel = null;

    public ?string $secondaryActionHref = null;

    public ?string $mediaUrl = null;

PHP));
writeFile("{$tpl}/Hero.html.twig", <<<'TWIG'
<section
    data-ui-role="hero"
    data-ui-fragment="blocks.marketing.hero"
    {{ attributes }}
>
    {% if badge %}<p>{{ badge }}</p>{% endif %}
    {% if headline %}<h1>{{ headline }}</h1>{% endif %}
    {% if subheadline %}<p>{{ subheadline }}</p>{% endif %}
    {% if mediaUrl %}<figure><img src="{{ mediaUrl }}" alt="" /></figure>{% endif %}
    <div>
        {% if primaryActionLabel and primaryActionHref %}
            <twig:Button as="a" href="{{ primaryActionHref }}">{{ primaryActionLabel }}</twig:Button>
        {% endif %}
        {% if secondaryActionLabel and secondaryActionHref %}
            <twig:Button variant="outline" as="a" href="{{ secondaryActionHref }}">{{ secondaryActionLabel }}</twig:Button>
        {% endif %}
    </div>
    {% block content %}{% endblock %}
</section>
TWIG);

writeFile("{$src}/Newsletter.php", sectionPhp('Newsletter', 'Newsletter', <<<'PHP'
    public string $headline = '';

    public string $submitLabel = 'Subscribe';

PHP));
writeFile("{$tpl}/Newsletter.html.twig", <<<'TWIG'
<section
    data-ui-role="newsletter"
    data-ui-fragment="blocks.marketing.newsletter"
    {{ attributes }}
>
    {% if headline %}<h2>{{ headline }}</h2>{% endif %}
    <form method="post" action="#">
        <twig:Field>
            <twig:Label>Email</twig:Label>
            <twig:Input type="email" name="email" />
        </twig:Field>
        <twig:Button type="submit">{{ submitLabel }}</twig:Button>
    </form>
    {% block content %}{% endblock %}
</section>
TWIG);

writeFile("{$src}/Faq.php", sectionPhp('Faq', 'Faq', <<<'PHP'
    /** @var list<array{question: string, answer: string}> */
    public array $items = [];

PHP));
writeFile("{$tpl}/Faq.html.twig", <<<'TWIG'
<section
    data-ui-role="faq"
    data-ui-fragment="blocks.marketing.faq"
    {{ attributes }}
>
    {% for item in items %}
        <details>
            <summary>{{ item.question }}</summary>
            <p>{{ item.answer }}</p>
        </details>
    {% endfor %}
    {% block content %}{% endblock %}
</section>
TWIG);

writeFile("{$src}/PricingSection.php", sectionPhp('PricingSection', 'PricingSection', <<<'PHP'
    /** @var list<array{name: string, price: string, features?: list<string>, highlighted?: bool}> */
    public array $tiers = [];

PHP));
writeFile("{$tpl}/PricingSection.html.twig", <<<'TWIG'
<section
    data-ui-role="pricing-section"
    data-ui-fragment="blocks.marketing.pricing-section"
    {{ attributes }}
>
    {% for tier in tiers %}
        <twig:Card>
            <h3>{{ tier.name }}</h3>
            <p>{{ tier.price }}</p>
            <ul>
                {% for feature in tier.features|default([]) %}
                    <li>{{ feature }}</li>
                {% endfor %}
            </ul>
        </twig:Card>
    {% endfor %}
    {% block content %}{% endblock %}
</section>
TWIG);

$landingSlots = [
    'header', 'banner', 'hero', 'logo_cloud', 'stats', 'features', 'content',
    'pricing', 'testimonials', 'faq', 'team', 'newsletter', 'cta', 'footer',
];
$slotBlocks = '';
foreach ($landingSlots as $slot) {
    $slotBlocks .= "    <div data-ui-slot=\"{$slot}\">{% block {$slot} %}{% endblock %}</div>\n";
}
writeFile("{$src}/LandingPage.php", sectionPhp('LandingPage', 'LandingPage'));
writeFile("{$tpl}/LandingPage.html.twig", <<<TWIG
<div
    data-ui-role="landing-page"
    data-ui-fragment="blocks.marketing.landing-page"
    {{ attributes }}
>
{$slotBlocks}</div>
TWIG);

writeFile("{$src}/FlyoutMenuMarketing.php", sectionPhp('FlyoutMenuMarketing', 'FlyoutMenuMarketing', <<<'PHP'
    public bool $enhanced = false;

    /** @var list<array{label: string, href: string, children?: list<array{label: string, href: string}>}> */
    public array $items = [];

PHP));
writeFile("{$tpl}/FlyoutMenuMarketing.html.twig", <<<'TWIG'
{% set use_extended = enhanced and ux_blocks_marketing_extended_available() %}
<nav
    data-ui-role="flyout-menu-marketing"
    data-ui-fragment="blocks.marketing.flyout-menu-marketing"
    {{ attributes }}
>
    {% if use_extended %}
        <twig:DropdownMenu>
            <twig:block name="trigger">
                <twig:Button>Menu</twig:Button>
            </twig:block>
            <twig:block name="content">
                {% for item in items %}
                    <twig:DropdownMenu:Item href="{{ item.href }}">{{ item.label }}</twig:DropdownMenu:Item>
                {% endfor %}
            </twig:block>
        </twig:DropdownMenu>
    {% else %}
        <ul>
            {% for item in items %}
                <li><a href="{{ item.href }}">{{ item.label }}</a></li>
            {% endfor %}
        </ul>
    {% endif %}
</nav>
TWIG);

writeFile("{$src}/ErrorPage404.php", sectionPhp('ErrorPage404', 'ErrorPage404', <<<'PHP'
    public string $headline = 'Page not found';

    public string $message = 'Sorry, we could not find that page.';

PHP));
writeFile("{$tpl}/ErrorPage404.html.twig", sectionTwig('error-page-404', 'main'));

foreach (array_merge($simple, [
    'hero' => 'Hero',
    'newsletter' => 'Newsletter',
    'faq' => 'Faq',
    'pricing-section' => 'PricingSection',
    'landing-page' => 'LandingPage',
    'flyout-menu-marketing' => 'FlyoutMenuMarketing',
    'error-page-404' => 'ErrorPage404',
]) as $role => $class) {
    writeFile("{$docs}/{$role}.md", "# {$class}\n\nRole `{$role}` · fragment `blocks.marketing.{$role}`\n");
}

echo "scaffold complete.\n";
