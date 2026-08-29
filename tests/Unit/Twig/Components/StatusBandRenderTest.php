<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class StatusBandRenderTest extends ComponentTestCase
{
    #[Test]
    public function rendersOperationalStatusStrip(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('StatusBand', [
            'headline' => 'All systems operational',
            'statusTone' => 'operational',
            'uptimeLabel' => '99.98% uptime',
            'incidentUrl' => '/status',
            'metrics' => [
                ['label' => 'API', 'value' => 'Operational'],
            ],
        ]);

        $this->assertRootAttributes($html, 'status-band', 'blocks.marketing.status-band');
        self::assertStringContainsString('data-ui-status-tone="operational"', $html);
        self::assertStringContainsString('All systems operational', $html);
    }
}
