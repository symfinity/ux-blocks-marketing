<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('ComparisonSection', template: '@UxBlocksMarketing/components/ComparisonSection.html.twig')]
final class ComparisonSection
{
    public string $headline = '';

    public string $subheadline = '';

    /** @var list<array{label: string, highlighted?: bool}> */
    public array $columns = [];

    /** @var list<array{feature: string, cells: list<array{value: string, emphasized?: bool}>}> */
    public array $rows = [];
}
