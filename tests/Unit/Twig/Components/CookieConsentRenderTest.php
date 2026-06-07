<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class CookieConsentRenderTest extends ComponentTestCase
{
    #[Test]
    public function rendersConsentActions(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('CookieConsent', [
            'headline' => 'We use cookies',
            'description' => 'Manage your preferences.',
            'acceptLabel' => 'Accept all',
            'rejectLabel' => 'Reject all',
            'categories' => [
                [
                    'id' => 'analytics',
                    'label' => 'Analytics',
                    'description' => 'Usage statistics',
                    'defaultEnabled' => false,
                ],
            ],
            'policyLinks' => [
                ['label' => 'Privacy policy', 'href' => '/privacy'],
            ],
        ]);

        $this->assertRootAttributes($html, 'cookie-consent', 'blocks.marketing.cookie-consent');
        self::assertStringContainsString('Accept all', $html);
        self::assertStringContainsString('type="checkbox"', $html);
        self::assertStringContainsString('Privacy policy', $html);
    }
}
