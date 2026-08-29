<?php

declare(strict_types=1);

use Symfony\Component\Yaml\Yaml;

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * One-shot handbook scaffold for 131 release — component-detail pages + example YAMLs.
 * Run from package root: php bin/scaffold-marketing-handbook.php
 */

$root = dirname(__DIR__);
$docsDir = $root . '/docs/components';
$examplesDir = $root . '/config/component-examples';

if (!is_dir($docsDir)) {
    mkdir($docsDir, 0775, true);
}
if (!is_dir($examplesDir)) {
    mkdir($examplesDir, 0775, true);
}

/** @var list<array{role: string, title: string, twig: string, summary: string, when: string, dont: string, usage: string, props: list<array{name: string, type: string, default: string, desc: string}>, a11y: string, related: list<string>, motion?: bool, yaml: array<string, mixed>}> */
$roles = [
    [
        'role' => 'hero',
        'title' => 'Hero',
        'twig' => 'Hero',
        'summary' => 'Primary landing hero with headline, actions, optional media, and optional entrance motion.',
        'when' => 'Use **Hero** as the first section on marketing and campaign pages. For compact promotional strips, use [Banner](banner.md) or [CtaBand](cta-band.md).',
        'dont' => 'Do not use for in-app page headers — prefer core [PageHeading](../ux-blocks-core/components/page-heading.md) from **ux-blocks-core**.',
        'usage' => <<<'TWIG'
<twig:Hero
    headline="Ship faster"
    subheadline="Composable marketing sections for Symfony apps."
    badge="New"
    primaryActionLabel="Get started"
    primaryActionHref="/signup"
    motion="fade-up"
/>
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Primary heading text'],
            ['name' => 'subheadline', 'type' => 'string', 'default' => "''", 'desc' => 'Supporting copy below the headline'],
            ['name' => 'badge', 'type' => 'string', 'default' => "''", 'desc' => 'Optional eyebrow badge above the headline'],
            ['name' => 'primaryActionLabel', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Primary CTA label'],
            ['name' => 'primaryActionHref', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Primary CTA href'],
            ['name' => 'secondaryActionLabel', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Secondary CTA label'],
            ['name' => 'secondaryActionHref', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Secondary CTA href'],
            ['name' => 'mediaUrl', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Optional hero media URL'],
            ['name' => 'motion', 'type' => 'string', 'default' => 'none', 'desc' => 'Entrance motion: `none`, `fade-up`, `blur-in`, `gradient-shift`'],
            ['name' => 'surface', 'type' => 'string', 'default' => 'solid', 'desc' => 'Surface substrate: `solid`, `glass`, …'],
            ['name' => 'iconWatermark', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Decorative icon watermark id'],
            ['name' => 'watermarkPosition', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Watermark position when iconWatermark is set'],
        ],
        'a11y' => 'Headline renders as a single logical heading. Action links use core Button semantics. Motion respects `prefers-reduced-motion`.',
        'related' => ['cta-band', 'landing-page'],
        'motion' => true,
        'yaml' => [
            'role' => 'hero',
            'twig_name' => 'Hero',
            'examples' => [
                ['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => [
                    'headline' => 'Ship faster',
                    'subheadline' => 'Marketing sections for Symfony',
                    'primaryActionLabel' => 'Get started',
                    'primaryActionHref' => '/signup',
                ]],
                ['id' => 'motion', 'title' => 'Fade up', 'section' => 'Motion', 'props' => [
                    'headline' => 'Launch day',
                    'motion' => 'fade-up',
                ]],
            ],
        ],
    ],
    [
        'role' => 'feature-section',
        'title' => 'Feature Section',
        'twig' => 'FeatureSection',
        'summary' => 'Three-up or grid feature highlights using composition-language regions.',
        'when' => 'Use for product capability grids on landing pages. Compose with region slots for icon, title, and body per column.',
        'dont' => 'Do not pass large prop arrays — use nested region components inside the section shell.',
        'usage' => <<<'TWIG'
<twig:FeatureSection>
    {% block content %}
        {# Compose with region components — see ux-blocks composition language #}
    {% endblock %}
</twig:FeatureSection>
TWIG,
        'props' => [],
        'a11y' => 'Section exposes `data-ui-role="feature-section"`. Ensure each feature column has a visible heading.',
        'related' => ['content-section', 'landing-page'],
        'yaml' => [
            'role' => 'feature-section',
            'twig_name' => 'FeatureSection',
            'examples' => [
                ['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []],
            ],
        ],
    ],
    [
        'role' => 'cta-band',
        'title' => 'Cta Band',
        'twig' => 'CtaBand',
        'summary' => 'Mid-page call-to-action band with optional motion.',
        'when' => 'Use between content sections to drive signup, demo booking, or secondary conversion.',
        'dont' => 'Do not stack multiple CTA bands back-to-back without intervening content.',
        'usage' => <<<'TWIG'
<twig:CtaBand motion="fade-up">
    {% block content %}
        {# Title, copy, and button group via composition regions #}
    {% endblock %}
</twig:CtaBand>
TWIG,
        'props' => [
            ['name' => 'motion', 'type' => 'string', 'default' => 'none', 'desc' => 'Entrance motion variant'],
            ['name' => 'iconWatermark', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Decorative watermark icon'],
            ['name' => 'watermarkPosition', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Watermark placement'],
        ],
        'a11y' => 'Primary action must remain keyboard-focusable. Motion disabled under reduced motion.',
        'related' => ['hero', 'banner'],
        'motion' => true,
        'yaml' => [
            'role' => 'cta-band',
            'twig_name' => 'CtaBand',
            'examples' => [
                ['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => ['motion' => 'none']],
            ],
        ],
    ],
    [
        'role' => 'pricing-section',
        'title' => 'Pricing Section',
        'twig' => 'PricingSection',
        'summary' => 'Tiered pricing cards with feature lists.',
        'when' => 'Use on SaaS landing pages when plan comparison belongs in the marketing flow.',
        'dont' => 'Do not use for checkout — pair with ecommerce tier when **130** ships.',
        'usage' => <<<'TWIG'
<twig:PricingSection :tiers="[
    { name: 'Starter', price: '$9/mo', features: ['All sections', 'Email support'] },
    { name: 'Pro', price: '$29/mo', features: ['Priority support'], highlighted: true },
]" />
TWIG,
        'props' => [
            ['name' => 'tiers', 'type' => 'array', 'default' => '[]', 'desc' => 'List of `{ name, price, features?, highlighted? }` tier objects'],
        ],
        'a11y' => 'Highlighted tier must not rely on colour alone — use `highlighted` for structural emphasis.',
        'related' => ['comparison-section', 'cta-band'],
        'yaml' => [
            'role' => 'pricing-section',
            'twig_name' => 'PricingSection',
            'examples' => [
                ['id' => 'default', 'title' => 'Two tiers', 'section' => 'Variants', 'props' => [
                    'tiers' => [
                        ['name' => 'Starter', 'price' => '$9/mo', 'features' => ['All sections']],
                        ['name' => 'Pro', 'price' => '$29/mo', 'features' => ['Priority support'], 'highlighted' => true],
                    ],
                ]],
            ],
        ],
    ],
    [
        'role' => 'landing-page',
        'title' => 'Landing Page',
        'twig' => 'LandingPage',
        'summary' => 'Compound page shell composing hero, features, pricing, and footer sections.',
        'when' => 'Use as the outer layout when building full marketing pages from marketing tier sections.',
        'dont' => 'Do not nest another LandingPage inside itself.',
        'usage' => <<<'TWIG'
<twig:LandingPage>
    {% block content %}
        <twig:Hero headline="Welcome" />
        <twig:FeatureSection>{% block content %}{% endblock %}</twig:FeatureSection>
        <twig:Footer>{% block content %}{% endblock %}</twig:Footer>
    {% endblock %}
</twig:LandingPage>
TWIG,
        'props' => [],
        'a11y' => 'Ensure a single logical `h1` within the composed page — typically from Hero.',
        'related' => ['hero', 'footer'],
        'yaml' => [
            'role' => 'landing-page',
            'twig_name' => 'LandingPage',
            'examples' => [
                ['id' => 'default', 'title' => 'Shell', 'section' => 'Variants', 'props' => []],
            ],
        ],
    ],
    [
        'role' => 'testimonials',
        'title' => 'Testimonials',
        'twig' => 'Testimonials',
        'summary' => 'Customer quote grid or carousel shell.',
        'when' => 'Use for social proof sections on landing pages.',
        'dont' => 'Do not use for product reviews with star ratings — ecommerce tier covers shop patterns.',
        'usage' => <<<'TWIG'
<twig:Testimonials>
    {% block content %}
        {# Quote cards via composition regions #}
    {% endblock %}
</twig:Testimonials>
TWIG,
        'props' => [],
        'a11y' => 'Quote text should be associated with author name in markup.',
        'related' => ['team', 'logo-cloud'],
        'yaml' => ['role' => 'testimonials', 'twig_name' => 'Testimonials', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'newsletter',
        'title' => 'Newsletter',
        'twig' => 'Newsletter',
        'summary' => 'Email capture section with headline and submit label.',
        'when' => 'Use for list-building sections at page foot or mid-page.',
        'dont' => 'Wire form persistence in your app — this role renders markup only.',
        'usage' => <<<'TWIG'
<twig:Newsletter headline="Stay in the loop" submitLabel="Subscribe" />
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Section headline'],
            ['name' => 'submitLabel', 'type' => 'string', 'default' => 'Subscribe', 'desc' => 'Submit button label'],
        ],
        'a11y' => 'Email input requires `<label>` or `aria-label`. Announce validation errors from your form layer.',
        'related' => ['cta-band', 'footer'],
        'yaml' => [
            'role' => 'newsletter',
            'twig_name' => 'Newsletter',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => ['headline' => 'Stay in the loop']]],
        ],
    ],
    [
        'role' => 'footer',
        'title' => 'Footer',
        'twig' => 'Footer',
        'summary' => 'Site footer shell with link columns and legal slots.',
        'when' => 'Use once per marketing layout for navigation and legal links.',
        'dont' => 'Do not use inside cards or modals.',
        'usage' => <<<'TWIG'
<twig:Footer>
    {% block content %}
        {# Link groups via composition regions #}
    {% endblock %}
</twig:Footer>
TWIG,
        'props' => [],
        'a11y' => 'Footer landmark uses `<footer>` semantics. Link groups need visible headings.',
        'related' => ['header-marketing', 'landing-page'],
        'yaml' => ['role' => 'footer', 'twig_name' => 'Footer', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'stats-band',
        'title' => 'Stats Band',
        'twig' => 'StatsBand',
        'summary' => 'Key metrics row with optional scroll-triggered motion.',
        'when' => 'Use for KPI highlights on landing and status pages.',
        'dont' => 'Do not animate counting without reduced-motion fallback.',
        'usage' => <<<'TWIG'
<twig:StatsBand motion="fade-up">
    {% block content %}
        {# Stat cells via composition #}
    {% endblock %}
</twig:StatsBand>
TWIG,
        'props' => [
            ['name' => 'motion', 'type' => 'string', 'default' => 'none', 'desc' => 'Scroll/motion variant'],
            ['name' => 'iconWatermark', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Decorative watermark'],
            ['name' => 'watermarkPosition', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Watermark placement'],
        ],
        'a11y' => 'Stat values need text labels. Motion respects reduced motion.',
        'related' => ['status-band', 'hero'],
        'motion' => true,
        'yaml' => ['role' => 'stats-band', 'twig_name' => 'StatsBand', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => ['motion' => 'none']]]],
    ],
    [
        'role' => 'logo-cloud',
        'title' => 'Logo Cloud',
        'twig' => 'LogoCloud',
        'summary' => 'Partner or customer logo strip with optional motion.',
        'when' => 'Use below hero or testimonials for trust signals.',
        'dont' => 'Do not use low-contrast logos without accessible alt text.',
        'usage' => <<<'TWIG'
<twig:LogoCloud motion="fade-up">
    {% block content %}
        {# Logo images via composition #}
    {% endblock %}
</twig:LogoCloud>
TWIG,
        'props' => [
            ['name' => 'motion', 'type' => 'string', 'default' => 'none', 'desc' => 'Entrance motion variant'],
        ],
        'a11y' => 'Each logo image requires meaningful `alt` text or `aria-hidden` when decorative.',
        'related' => ['integrations-section', 'testimonials'],
        'motion' => true,
        'yaml' => ['role' => 'logo-cloud', 'twig_name' => 'LogoCloud', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => ['motion' => 'none']]]],
    ],
    [
        'role' => 'faq',
        'title' => 'Faq',
        'twig' => 'Faq',
        'summary' => 'Accordion-style FAQ list from structured items.',
        'when' => 'Use for product questions on landing pages.',
        'dont' => 'Do not hide critical legal text solely in FAQ accordions.',
        'usage' => <<<'TWIG'
<twig:Faq :items="[
    { question: 'What is included?', answer: 'All marketing section roles.' },
    { question: 'Does it require ui-kernel?', answer: 'Recommended for themed apps.' },
]" />
TWIG,
        'props' => [
            ['name' => 'items', 'type' => 'array', 'default' => '[]', 'desc' => 'List of `{ question, answer }` pairs'],
        ],
        'a11y' => 'Questions expose button/disclosure semantics. Answers remain in DOM when collapsed.',
        'related' => ['content-section', 'pricing-section'],
        'yaml' => [
            'role' => 'faq',
            'twig_name' => 'Faq',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => [
                'items' => [['question' => 'What is included?', 'answer' => 'Twenty-two marketing roles.']],
            ]]],
        ],
    ],
    [
        'role' => 'team',
        'title' => 'Team',
        'twig' => 'Team',
        'summary' => 'Team member grid shell.',
        'when' => 'Use on about pages and hiring landing sections.',
        'dont' => 'Do not use for user avatars in app UI — use core Avatar.',
        'usage' => <<<'TWIG'
<twig:Team>
    {% block content %}
        {# Member cards via composition #}
    {% endblock %}
</twig:Team>
TWIG,
        'props' => [],
        'a11y' => 'Member photos need alt text with person name.',
        'related' => ['testimonials', 'content-section'],
        'yaml' => ['role' => 'team', 'twig_name' => 'Team', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'content-section',
        'title' => 'Content Section',
        'twig' => 'ContentSection',
        'summary' => 'Generic prose or media section with optional glass surface.',
        'when' => 'Use for long-form copy blocks between specialized sections.',
        'dont' => 'Do not nest full landing shells inside content sections.',
        'usage' => <<<'TWIG'
<twig:ContentSection surface="glass">
    {% block content %}
        {# Prose via Typography region components #}
    {% endblock %}
</twig:ContentSection>
TWIG,
        'props' => [
            ['name' => 'surface', 'type' => 'string', 'default' => 'solid', 'desc' => 'Surface substrate token'],
        ],
        'a11y' => 'Prose blocks should use semantic headings in order.',
        'related' => ['feature-section', 'banner'],
        'yaml' => ['role' => 'content-section', 'twig_name' => 'ContentSection', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'bento-grid',
        'title' => 'Bento Grid',
        'twig' => 'BentoGrid',
        'summary' => 'Asymmetric bento layout with optional stagger motion.',
        'when' => 'Use for feature showcases with varied tile sizes.',
        'dont' => 'Do not overload with more than six tiles without responsive testing.',
        'usage' => <<<'TWIG'
<twig:BentoGrid motion="fade-up">
    {% block content %}
        {# Bento tiles via composition #}
    {% endblock %}
</twig:BentoGrid>
TWIG,
        'props' => [
            ['name' => 'motion', 'type' => 'string', 'default' => 'none', 'desc' => 'Stagger motion variant'],
            ['name' => 'iconWatermark', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Decorative watermark'],
            ['name' => 'watermarkPosition', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Watermark placement'],
        ],
        'a11y' => 'Each tile needs a focusable target when interactive. Motion respects reduced motion.',
        'related' => ['feature-section', 'hero'],
        'motion' => true,
        'yaml' => ['role' => 'bento-grid', 'twig_name' => 'BentoGrid', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => ['motion' => 'none']]]],
    ],
    [
        'role' => 'banner',
        'title' => 'Banner',
        'twig' => 'Banner',
        'summary' => 'Compact promotional strip for announcements.',
        'when' => 'Use for site-wide promos above the header or inline alerts.',
        'dont' => 'Do not replace Hero for primary page messaging.',
        'usage' => <<<'TWIG'
<twig:Banner>
    {% block content %}
        {# Short promo copy and dismiss control via composition #}
    {% endblock %}
</twig:Banner>
TWIG,
        'props' => [],
        'a11y' => 'Dismiss control must be keyboard accessible when present.',
        'related' => ['status-band', 'cta-band'],
        'yaml' => ['role' => 'banner', 'twig_name' => 'Banner', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'header-marketing',
        'title' => 'Header Marketing',
        'twig' => 'HeaderMarketing',
        'summary' => 'Marketing site header shell with nav slots.',
        'when' => 'Use as top chrome on landing layouts.',
        'dont' => 'Do not use for authenticated app nav — use core Navbar patterns.',
        'usage' => <<<'TWIG'
<twig:HeaderMarketing>
    {% block content %}
        {# Logo and nav links via composition #}
    {% endblock %}
</twig:HeaderMarketing>
TWIG,
        'props' => [],
        'a11y' => 'Nav landmark with skip link recommended in host layout.',
        'related' => ['flyout-menu-marketing', 'footer'],
        'yaml' => ['role' => 'header-marketing', 'twig_name' => 'HeaderMarketing', 'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]]],
    ],
    [
        'role' => 'flyout-menu-marketing',
        'title' => 'Flyout Menu Marketing',
        'twig' => 'FlyoutMenuMarketing',
        'summary' => 'Marketing navigation with optional enhanced mega-menu (extended tier).',
        'when' => 'Use in HeaderMarketing for multi-level site navigation.',
        'dont' => 'Do not enable `enhanced` without `symfinity/ux-blocks-extended` installed.',
        'usage' => <<<'TWIG'
<twig:FlyoutMenuMarketing :enhanced="false" :items="[
    { label: 'Product', href: '/product' },
    { label: 'Resources', href: '/docs', children: [
        { label: 'Handbook', href: '/docs' },
    ]},
]" />
TWIG,
        'props' => [
            ['name' => 'enhanced', 'type' => 'bool', 'default' => 'false', 'desc' => 'Use extended dropdown (stl) when true'],
            ['name' => 'items', 'type' => 'array', 'default' => '[]', 'desc' => 'Nav tree `{ label, href, children? }`'],
        ],
        'a11y' => 'Flyout triggers need `aria-expanded`. Mega-menu panels trap focus when open (extended tier).',
        'related' => ['header-marketing'],
        'yaml' => [
            'role' => 'flyout-menu-marketing',
            'twig_name' => 'FlyoutMenuMarketing',
            'examples' => [['id' => 'default', 'title' => 'Simple nav', 'section' => 'Variants', 'props' => [
                'items' => [['label' => 'Product', 'href' => '/product'], ['label' => 'Docs', 'href' => '/docs']],
            ]]],
        ],
    ],
    [
        'role' => 'error-page-404',
        'title' => 'Error Page 404',
        'twig' => 'ErrorPage404',
        'summary' => 'Marketing-styled not-found page section.',
        'when' => 'Use in Symfony error templates for public marketing sites.',
        'dont' => 'Do not use for API JSON 404 responses.',
        'usage' => <<<'TWIG'
<twig:ErrorPage404 headline="Page not found" message="Sorry, we could not find that page." />
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => 'Page not found', 'desc' => 'Error headline'],
            ['name' => 'message', 'type' => 'string', 'default' => 'Sorry, we could not find that page.', 'desc' => 'Supporting message'],
        ],
        'a11y' => 'Headline should be the page `h1` in error layout.',
        'related' => ['hero', 'cta-band'],
        'yaml' => [
            'role' => 'error-page-404',
            'twig_name' => 'ErrorPage404',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => []]],
        ],
    ],
    [
        'role' => 'comparison-section',
        'title' => 'Comparison Section',
        'twig' => 'ComparisonSection',
        'summary' => 'Feature comparison matrix across plan columns.',
        'when' => 'Use when pricing alone is insufficient for plan differentiation.',
        'dont' => 'Do not embed checkout buttons inside the matrix — link to pricing CTAs.',
        'usage' => <<<'TWIG'
<twig:ComparisonSection
    headline="Compare plans"
    :columns="[{ label: 'Starter' }, { label: 'Pro', highlighted: true }]"
    :rows="[
        { feature: 'Sections', cells: [{ value: 'All' }, { value: 'All' }] },
    ]"
/>
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Section headline'],
            ['name' => 'subheadline', 'type' => 'string', 'default' => "''", 'desc' => 'Supporting copy'],
            ['name' => 'columns', 'type' => 'array', 'default' => '[]', 'desc' => 'Column headers `{ label, highlighted? }`'],
            ['name' => 'rows', 'type' => 'array', 'default' => '[]', 'desc' => 'Rows `{ feature, cells: [{ value, emphasized? }] }`'],
        ],
        'a11y' => 'Use `<table>` semantics or grid roles with header cells for screen readers.',
        'related' => ['pricing-section'],
        'yaml' => [
            'role' => 'comparison-section',
            'twig_name' => 'ComparisonSection',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => [
                'headline' => 'Compare',
                'columns' => [['label' => 'Starter'], ['label' => 'Pro', 'highlighted' => true]],
                'rows' => [['feature' => 'Sections', 'cells' => [['value' => 'All'], ['value' => 'All']]]],
            ]]],
        ],
    ],
    [
        'role' => 'integrations-section',
        'title' => 'Integrations Section',
        'twig' => 'IntegrationsSection',
        'summary' => 'Partner or integration logo grid with descriptions.',
        'when' => 'Use on product pages listing supported integrations.',
        'dont' => 'Do not imply partnerships without legal approval.',
        'usage' => <<<'TWIG'
<twig:IntegrationsSection
    headline="Works with your stack"
    :items="[
        { title: 'Symfony', description: 'First-class bundle', href: 'https://symfony.com' },
    ]"
/>
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Section headline'],
            ['name' => 'subheadline', 'type' => 'string', 'default' => "''", 'desc' => 'Supporting copy'],
            ['name' => 'items', 'type' => 'array', 'default' => '[]', 'desc' => 'Integration cards `{ title, logoUrl?, description?, href?, category? }`'],
        ],
        'a11y' => 'External links should indicate they open a new context when applicable.',
        'related' => ['logo-cloud', 'feature-section'],
        'yaml' => [
            'role' => 'integrations-section',
            'twig_name' => 'IntegrationsSection',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => [
                'headline' => 'Integrations',
                'items' => [['title' => 'Symfony', 'description' => 'First-class bundle']],
            ]]],
        ],
    ],
    [
        'role' => 'cookie-consent',
        'title' => 'Cookie Consent',
        'twig' => 'CookieConsent',
        'summary' => 'Cookie banner with category toggles — host app owns persistence.',
        'when' => 'Use for GDPR-style consent on marketing sites.',
        'dont' => 'Do not rely on this bundle for legal compliance storage — wire accept/reject handlers in your app.',
        'usage' => <<<'TWIG'
<twig:CookieConsent
    headline="We use cookies"
    description="Choose which categories you allow."
    acceptLabel="Accept all"
    :categories="[
        { id: 'necessary', label: 'Necessary', defaultEnabled: true },
        { id: 'analytics', label: 'Analytics' },
    ]"
/>
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Banner headline'],
            ['name' => 'description', 'type' => 'string', 'default' => "''", 'desc' => 'Body copy'],
            ['name' => 'categories', 'type' => 'array', 'default' => '[]', 'desc' => 'Consent categories `{ id, label, description?, defaultEnabled? }`'],
            ['name' => 'acceptLabel', 'type' => 'string', 'default' => "''", 'desc' => 'Accept button label'],
            ['name' => 'rejectLabel', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Optional reject label'],
            ['name' => 'customizeLabel', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Optional customize label'],
            ['name' => 'policyLinks', 'type' => 'array', 'default' => '[]', 'desc' => 'Policy links `{ label, href }`'],
        ],
        'a11y' => 'Banner must not trap focus until user opens customize panel. Toggle switches need labels.',
        'related' => ['banner', 'footer'],
        'yaml' => [
            'role' => 'cookie-consent',
            'twig_name' => 'CookieConsent',
            'examples' => [['id' => 'default', 'title' => 'Default', 'section' => 'Variants', 'props' => [
                'headline' => 'We use cookies',
                'acceptLabel' => 'Accept all',
            ]]],
        ],
    ],
    [
        'role' => 'status-band',
        'title' => 'Status Band',
        'twig' => 'StatusBand',
        'summary' => 'Operational status strip with tone and metrics.',
        'when' => 'Use on status or trust pages summarizing uptime.',
        'dont' => 'Do not poll live status from this component — pass data from your status service.',
        'usage' => <<<'TWIG'
<twig:StatusBand
    headline="All systems operational"
    statusTone="operational"
    uptimeLabel="99.9% uptime"
    :metrics="[{ label: 'API', value: 'Operational' }]"
/>
TWIG,
        'props' => [
            ['name' => 'headline', 'type' => 'string', 'default' => "''", 'desc' => 'Status headline'],
            ['name' => 'statusTone', 'type' => 'string', 'default' => 'operational', 'desc' => 'Tone token: operational, degraded, outage, …'],
            ['name' => 'uptimeLabel', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Optional uptime summary'],
            ['name' => 'incidentUrl', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Link to incident details'],
            ['name' => 'lastUpdated', 'type' => 'string|null', 'default' => 'null', 'desc' => 'Human-readable last updated stamp'],
            ['name' => 'metrics', 'type' => 'array', 'default' => '[]', 'desc' => 'Metric rows `{ label, value }`'],
        ],
        'a11y' => 'Status tone must include text label, not colour alone.',
        'related' => ['stats-band', 'banner'],
        'yaml' => [
            'role' => 'status-band',
            'twig_name' => 'StatusBand',
            'examples' => [['id' => 'default', 'title' => 'Operational', 'section' => 'Variants', 'props' => [
                'headline' => 'All systems operational',
                'statusTone' => 'operational',
            ]]],
        ],
    ],
];

function writeFile(string $path, string $content): void
{
    file_put_contents($path, $content);
    echo "wrote {$path}\n";
}

function renderComponentDoc(array $role): string
{
    $title = $role['title'];
    $id = $role['role'];
    $twig = $role['twig'];
    $motionNote = ($role['motion'] ?? false)
        ? "\n\nSupports optional **motion** prop (`049`) — disabled when `prefers-reduced-motion: reduce`."
        : '';

    $propsTable = '';
    if ($role['props'] !== []) {
        $rows = [];
        foreach ($role['props'] as $p) {
            $rows[] = sprintf('| `%s` | %s | %s | %s |', $p['name'], $p['type'], $p['default'], $p['desc']);
        }
        $propsTable = "## API Reference\n\n| Prop | Type | Default | Description |\n|------|------|---------|-------------|\n" . implode("\n", $rows) . "\n";
    } else {
        $propsTable = "## API Reference\n\nThis role is a **composition shell** — content is supplied via the `content` block and region components (composition language **108**). No dedicated PHP props.\n";
    }

    $related = '';
    if ($role['related'] !== []) {
        $links = array_map(static fn (string $r): string => sprintf('[%s](%s.md)', ucwords(str_replace('-', ' ', $r)), $r), $role['related']);
        $related = "## Related\n\n- " . implode("\n- ", $links) . "\n";
    }

    return <<<MD
# {$title}

{$role['summary']}{$motionNote}

Role `{$id}` · fragment `blocks.marketing.{$id}` · interaction `nat`

## When to use

{$role['when']}

## Guidelines

**Do**

- Compose with ui-kernel theme CSS for token-backed spacing and colour.
- Verify registry markup: `data-ui-role="{$id}"` and `data-ui-fragment="blocks.marketing.{$id}"`.

**Don't**

- {$role['dont']}

## Usage

```twig
{$role['usage']}
```

Variant previews render live from `config/component-examples/{$id}.yaml`.

{$propsTable}
## Accessibility

{$role['a11y']}

{$related}
MD;
}

foreach ($roles as $role) {
    $docPath = $docsDir . '/' . $role['role'] . '.md';
    writeFile($docPath, renderComponentDoc($role));

    $yamlPath = $examplesDir . '/' . $role['role'] . '.yaml';
    $yaml = Yaml::dump($role['yaml'], 4, 2, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK);
    writeFile($yamlPath, $yaml);
}

echo "Done — " . count($roles) . " component pages + YAML manifests.\n";
