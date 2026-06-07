<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class IntegrationsSectionRenderTest extends ComponentTestCase
{
    #[Test]
    public function rendersPartnerGrid(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('IntegrationsSection', [
            'headline' => 'Integrations',
            'items' => [
                [
                    'title' => 'Stripe',
                    'description' => 'Payments',
                    'category' => 'Payments',
                    'href' => 'https://stripe.com',
                ],
            ],
        ]);

        $this->assertRootAttributes($html, 'integrations-section', 'blocks.marketing.integrations-section');
        self::assertStringContainsString('Stripe', $html);
        self::assertStringContainsString('Payments', $html);
    }
}
