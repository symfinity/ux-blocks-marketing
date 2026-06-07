<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('BentoGrid', template: '@UxBlocksMarketing/components/BentoGrid.html.twig')]
final class BentoGrid
{
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'bento-grid';
    }
}
