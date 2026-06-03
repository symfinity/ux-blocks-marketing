<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('PricingSection', template: '@UxBlocksMarketing/components/PricingSection.html.twig')]
final class PricingSection
{
    /** @var list<array{name: string, price: string, features?: list<string>, highlighted?: bool}> */
    public array $tiers = [];

}
