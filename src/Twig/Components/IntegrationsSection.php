<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('IntegrationsSection', template: '@UxBlocksMarketing/components/IntegrationsSection.html.twig')]
final class IntegrationsSection
{
    public string $headline = '';

    public string $subheadline = '';

    /** @var list<array{title: string, logoUrl?: string, description?: string, href?: string, category?: string}> */
    public array $items = [];
}
