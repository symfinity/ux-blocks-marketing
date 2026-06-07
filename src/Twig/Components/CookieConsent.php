<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('CookieConsent', template: '@UxBlocksMarketing/components/CookieConsent.html.twig')]
final class CookieConsent
{
    public string $headline = '';

    public string $description = '';

    /** @var list<array{id: string, label: string, description?: string, defaultEnabled?: bool}> */
    public array $categories = [];

    public string $acceptLabel = '';

    public ?string $rejectLabel = null;

    public ?string $customizeLabel = null;

    /** @var list<array{label: string, href: string}> */
    public array $policyLinks = [];
}
