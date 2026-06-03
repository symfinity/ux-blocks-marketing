<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Hero', template: '@UxBlocksMarketing/components/Hero.html.twig')]
final class Hero
{
    public string $headline = '';

    public string $subheadline = '';

    public string $badge = '';

    public ?string $primaryActionLabel = null;

    public ?string $primaryActionHref = null;

    public ?string $secondaryActionLabel = null;

    public ?string $secondaryActionHref = null;

    public ?string $mediaUrl = null;

}
