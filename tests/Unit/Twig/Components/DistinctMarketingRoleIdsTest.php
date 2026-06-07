<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DistinctMarketingRoleIdsTest extends ComponentTestCase
{
    #[Test]
    public function statusBandAndStatsBandUseDistinctFragments(): void
    {
        self::bootKernel();

        $statusHtml = $this->renderComponent('StatusBand', [
            'headline' => 'All systems operational',
            'uptimeLabel' => '99.98% uptime',
        ]);
        $statsHtml = $this->renderComponent('StatsBand', []);

        $this->assertRootAttributes($statusHtml, 'status-band', 'blocks.marketing.status-band');
        $this->assertRootAttributes($statsHtml, 'stats-band', 'blocks.marketing.stats-band');

        self::assertStringNotContainsString('blocks.marketing.stats-band', $statusHtml);
        self::assertStringNotContainsString('blocks.marketing.status-band', $statsHtml);
    }

    #[Test]
    public function cookieConsentAndBannerUseDistinctFragments(): void
    {
        self::bootKernel();

        $consentHtml = $this->renderComponent('CookieConsent', [
            'headline' => 'We use cookies',
            'description' => 'Choose your preferences.',
            'acceptLabel' => 'Accept all',
        ]);
        $bannerHtml = $this->renderComponent('Banner', []);

        $this->assertRootAttributes($consentHtml, 'cookie-consent', 'blocks.marketing.cookie-consent');
        $this->assertRootAttributes($bannerHtml, 'banner', 'blocks.marketing.banner');

        self::assertStringNotContainsString('blocks.marketing.banner', $consentHtml);
        self::assertStringNotContainsString('blocks.marketing.cookie-consent', $bannerHtml);
    }
}
