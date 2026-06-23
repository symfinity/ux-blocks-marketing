<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('ContentSection', template: '@UxBlocksMarketing/components/ContentSection.html.twig')]
final class ContentSection
{
    use ResolvesSurfaceSubstrate;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }
}
