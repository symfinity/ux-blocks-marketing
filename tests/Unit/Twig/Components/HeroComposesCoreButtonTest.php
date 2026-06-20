<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksMarketing\Tests\Integration\UxBlocksMarketingFragmentTestKernel;

final class HeroComposesCoreButtonTest extends ComponentTestCase
{
    protected static function getKernelClass(): string
    {
        return UxBlocksMarketingFragmentTestKernel::class;
    }

    #[Test]
    public function heroUsesCoreButtonWithoutFragmentCollision(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Hero', [
            'headline' => 'Hello',
            'primaryActionLabel' => 'Go',
            'primaryActionHref' => '/go',
        ]);

        $this->assertRootAttributes($html, 'hero', 'blocks.marketing.hero');
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.button"', $html);
        self::assertStringNotContainsString('blocks.marketing.button', $html);
    }
}
