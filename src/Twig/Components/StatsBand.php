<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesIconWatermark;
use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('StatsBand', template: '@UxBlocksMarketing/components/StatsBand.html.twig')]
final class StatsBand
{
    use ResolvesIconWatermark;
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'stats-band';
    }

    #[ExposeInTemplate('resolved_icon_watermark')]
    public function resolvedIconWatermark(): ?string
    {
        return $this->resolveIconWatermark();
    }

    #[ExposeInTemplate('resolved_watermark_position')]
    public function resolvedWatermarkPosition(): string
    {
        return $this->resolveWatermarkPosition('top-start');
    }
}
