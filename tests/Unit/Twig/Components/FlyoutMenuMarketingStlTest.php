<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksMarketing\Tests\Integration\UxBlocksMarketingExtendedTestKernel;

#[Group('marketing-extended')]
final class FlyoutMenuMarketingStlTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksMarketingExtendedTestKernel::class;
    }

    #[Test]
    public function stlPathWhenExtendedPresent(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('FlyoutMenuMarketing', [
            'enhanced' => true,
            'items' => [['label' => 'Docs', 'href' => '/docs']],
        ]);

        self::assertStringContainsString('data-ui-role="flyout-menu-marketing"', $html);
        self::assertStringContainsString('data-controller="symfony--ux-blocks-extended--dropdown-menu"', $html);
    }
}
