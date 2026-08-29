<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Newsletter', template: '@UxBlocksMarketing/components/Newsletter.html.twig')]
final class Newsletter
{
    public string $headline = '';

    public string $submitLabel = 'Subscribe';

}
