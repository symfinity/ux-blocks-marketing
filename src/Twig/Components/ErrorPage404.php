<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('ErrorPage404', template: '@UxBlocksMarketing/components/ErrorPage404.html.twig')]
final class ErrorPage404
{
    public string $headline = 'Page not found';

    public string $message = 'Sorry, we could not find that page.';

}
