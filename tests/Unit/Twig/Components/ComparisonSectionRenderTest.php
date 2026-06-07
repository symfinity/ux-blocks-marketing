<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class ComparisonSectionRenderTest extends ComponentTestCase
{
    #[Test]
    public function rendersComparisonMatrix(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('ComparisonSection', [
            'headline' => 'Compare plans',
            'columns' => [
                ['label' => 'Starter'],
                ['label' => 'Pro', 'highlighted' => true],
            ],
            'rows' => [
                [
                    'feature' => 'Support',
                    'cells' => [
                        ['value' => 'Email'],
                        ['value' => 'Priority', 'emphasized' => true],
                    ],
                ],
            ],
        ]);

        $this->assertRootAttributes($html, 'comparison-section', 'blocks.marketing.comparison-section');
        self::assertStringContainsString('Compare plans', $html);
        self::assertStringContainsString('data-ui-highlight="true"', $html);
    }
}
