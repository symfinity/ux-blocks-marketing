<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesIconWatermark;
use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('BentoGrid', template: '@UxBlocksMarketing/components/BentoGrid.html.twig')]
final class BentoGrid
{
    use ResolvesIconWatermark;
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'bento-grid';
    }

    #[ExposeInTemplate('resolved_icon_watermark')]
    public function resolvedIconWatermark(): ?string
    {
        return $this->resolveIconWatermark();
    }

    #[ExposeInTemplate('resolved_watermark_position')]
    public function resolvedWatermarkPosition(): string
    {
        return $this->resolveWatermarkPosition('center');
    }
}
