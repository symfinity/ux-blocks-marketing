<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\MarketingRoleCatalog;
use Symfony\Component\Yaml\Yaml;

final class MarketingR2RegistryParityTest extends TestCase
{
    /** @return list<string> */
    private static function r2Roles(): array
    {
        return [
            'comparison-section',
            'integrations-section',
            'cookie-consent',
            'status-band',
        ];
    }

    #[Test]
    public function catalogListsTwentyTwoUniqueRoles(): void
    {
        $roles = MarketingRoleCatalog::roles();

        self::assertCount(22, $roles);
        self::assertSame($roles, array_values(array_unique($roles)));
    }

    #[Test]
    public function yamlRegistryMatchesCatalogIncludingR2Rows(): void
    {
        $registry = Yaml::parseFile(\dirname(__DIR__, 2) . '/config/ux_roles.yaml');
        $yamlRoles = array_column($registry['roles'], 'role');

        self::assertSame(MarketingRoleCatalog::roles(), $yamlRoles);

        foreach (self::r2Roles() as $role) {
            $row = $this->findRole($registry, $role);
            self::assertSame('shipped', $row['status']);
            self::assertSame(MarketingRoleCatalog::twigComponentForRole($role), $row['twig_component']);
            self::assertSame('blocks.marketing.' . $role, $row['fragment_id']);
        }
    }

    /**
     * @param array<string, mixed> $registry
     *
     * @return array<string, mixed>
     */
    private function findRole(array $registry, string $role): array
    {
        foreach ($registry['roles'] as $row) {
            if (($row['role'] ?? null) === $role) {
                return $row;
            }
        }

        self::fail(sprintf('Role "%s" not found in ux_roles.yaml', $role));
    }
}
