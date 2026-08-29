<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesIconWatermark;
use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfinity\UxBlocksMarketing\Motion\UsesMotionProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Hero', template: '@UxBlocksMarketing/components/Hero.html.twig')]
final class Hero
{
    use ResolvesIconWatermark;
    use ResolvesSurfaceSubstrate;
    use UsesMotionProp;

    protected function motionRoleId(): string
    {
        return 'hero';
    }

    public string $headline = '';

    public string $subheadline = '';

    public string $badge = '';

    public ?string $primaryActionLabel = null;

    public ?string $primaryActionHref = null;

    public ?string $secondaryActionLabel = null;

    public ?string $secondaryActionHref = null;

    public ?string $mediaUrl = null;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }

    #[ExposeInTemplate('resolved_icon_watermark')]
    public function resolvedIconWatermark(): ?string
    {
        return $this->resolveIconWatermark();
    }

    #[ExposeInTemplate('resolved_watermark_position')]
    public function resolvedWatermarkPosition(): string
    {
        return $this->resolveWatermarkPosition('top-end');
    }
}
