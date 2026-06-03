<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FlyoutMenuMarketingNatTest extends ComponentTestCase
{
    #[Test]
    public function natFallbackWhenExtendedAbsentEvenIfEnhanced(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('FlyoutMenuMarketing', [
            'enhanced' => true,
            'items' => [['label' => 'Home', 'href' => '/']],
        ]);

        $this->assertRootAttributes($html, 'flyout-menu-marketing', 'blocks.marketing.flyout-menu-marketing');
        self::assertStringContainsString('<ul>', $html);
        self::assertStringNotContainsString('data-controller="symfony--ux-blocks-extended--dropdown-menu"', $html);
    }
}
