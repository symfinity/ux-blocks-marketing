<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StatusBand', template: '@UxBlocksMarketing/components/StatusBand.html.twig')]
final class StatusBand
{
    public string $headline = '';

    public string $statusTone = 'operational';

    public ?string $uptimeLabel = null;

    public ?string $incidentUrl = null;

    public ?string $lastUpdated = null;

    /** @var list<array{label: string, value: string}> */
    public array $metrics = [];
}
