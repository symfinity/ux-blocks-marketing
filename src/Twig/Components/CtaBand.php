<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('CtaBand', template: '@UxBlocksMarketing/components/CtaBand.html.twig')]
final class CtaBand
{
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'cta-band';
    }
}
