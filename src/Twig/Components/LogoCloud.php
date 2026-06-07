<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('LogoCloud', template: '@UxBlocksMarketing/components/LogoCloud.html.twig')]
final class LogoCloud
{
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'logo-cloud';
    }
}
