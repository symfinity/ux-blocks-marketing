<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksMarketing\Twig\Components\MarketingFragmentId;

final class FragmentSuffixTest extends TestCase
{
    #[Test]
    public function duplicateInstanceUsesNumericSuffix(): void
    {
        self::assertSame('blocks.marketing.hero', MarketingFragmentId::forRole('hero'));
        self::assertSame('blocks.marketing.hero.2', MarketingFragmentId::forRole('hero', 2));
        self::assertSame('blocks.marketing.feature-section.3', MarketingFragmentId::forRole('feature-section', 3));
    }
}
