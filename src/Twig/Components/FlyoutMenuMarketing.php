<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FlyoutMenuMarketing', template: '@UxBlocksMarketing/components/FlyoutMenuMarketing.html.twig')]
final class FlyoutMenuMarketing
{
    public bool $enhanced = false;

    /** @var list<array{label: string, href: string, children?: list<array{label: string, href: string}>}> */
    public array $items = [];

}
