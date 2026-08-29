<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Faq', template: '@UxBlocksMarketing/components/Faq.html.twig')]
final class Faq
{
    /** @var list<array{question: string, answer: string}> */
    public array $items = [];

}
