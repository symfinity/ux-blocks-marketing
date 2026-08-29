<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocks\Registry\MarketingRoleCatalog;

final class MarketingRolesTest extends ComponentTestCase
{
    /** @return array<string, array{0: string, 1: string}> */
    public static function marketingRoleProvider(): array
    {
        $cases = [];
        foreach (MarketingRoleCatalog::roles() as $role) {
            if (in_array($role, ['landing-page', 'flyout-menu-marketing'], true)) {
                continue;
            }
            $cases[$role] = [$role, MarketingRoleCatalog::twigComponentForRole($role)];
        }

        return $cases;
    }

    #[Test]
    #[DataProvider('marketingRoleProvider')]
    public function sectionRendersRoleAndFragment(string $role, string $component): void
    {
        self::bootKernel();
        $html = $this->renderComponent($component, $this->propsFor($role, $component));

        $this->assertRootAttributes($html, $role, 'blocks.marketing.' . $role);
    }

    /** @return array<string, mixed> */
    private function propsFor(string $role, string $component): array
    {
        return match ($component) {
            'Hero' => [
                'headline' => 'Ship faster',
                'subheadline' => 'Marketing sections for Symfony',
                'primaryActionLabel' => 'Start',
                'primaryActionHref' => '/start',
            ],
            'Faq' => [
                'items' => [
                    ['question' => 'Q?', 'answer' => 'A.'],
                ],
            ],
            'PricingSection' => [
                'tiers' => [
                    ['name' => 'Pro', 'price' => '$9', 'features' => ['All sections']],
                ],
            ],
            'Newsletter' => ['headline' => 'Stay in the loop'],
            'ErrorPage404' => [],
            'ComparisonSection' => [
                'headline' => 'Compare',
                'columns' => [['label' => 'A']],
                'rows' => [
                    ['feature' => 'Feature', 'cells' => [['value' => 'Yes']]],
                ],
            ],
            'IntegrationsSection' => [
                'items' => [['title' => 'Partner']],
            ],
            'CookieConsent' => [
                'headline' => 'Cookies',
                'acceptLabel' => 'Accept',
            ],
            'StatusBand' => [
                'headline' => 'Operational',
            ],
            default => [],
        };
    }
}
