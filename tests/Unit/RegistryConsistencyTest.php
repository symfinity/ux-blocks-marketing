<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\MarketingRoleCatalog;
use Symfony\Component\Yaml\Yaml;

final class RegistryConsistencyTest extends TestCase
{
    /** @return array<string, array{0: string}> */
    public static function marketingRoleProvider(): array
    {
        $provider = [];
        foreach (MarketingRoleCatalog::roles() as $role) {
            $provider[$role] = [$role];
        }

        return $provider;
    }

    #[Test]
    public function yamlSchemaVersionMatchesContract(): void
    {
        $registry = $this->loadRegistry();

        self::assertSame('1.1', $registry['ux_role_registry']);
        self::assertSame('blocks.marketing', $registry['registry_prefix']);
    }

    #[Test]
    public function yamlContainsAllMarketingRoles(): void
    {
        $registry = $this->loadRegistry();
        $roles = array_column($registry['roles'], 'role');

        self::assertSame(MarketingRoleCatalog::roles(), $roles);
    }

    #[Test]
    #[DataProvider('marketingRoleProvider')]
    public function eachRowHasRequiredFields(string $role): void
    {
        $row = $this->findRole($role);

        self::assertSame($role, $row['role']);
        self::assertSame(MarketingRoleCatalog::twigComponentForRole($role), $row['twig_component']);
        self::assertStringStartsWith('Symfinity\\UxBlocksMarketing\\Twig\\Components\\', $row['php_class']);
        self::assertSame('blocks.marketing.' . $role, $row['fragment_id']);
        self::assertSame('blocks.marketing.' . $role . '.{n}', $row['fragment_pattern']);
        self::assertSame('shipped', $row['status']);
    }

    /** @return array<string, mixed> */
    private function loadRegistry(): array
    {
        return Yaml::parseFile(\dirname(__DIR__, 2) . '/config/ux_roles.yaml');
    }

    /** @return array<string, mixed> */
    private function findRole(string $role): array
    {
        foreach ($this->loadRegistry()['roles'] as $row) {
            if (($row['role'] ?? null) === $role) {
                return $row;
            }
        }

        self::fail(sprintf('Role "%s" not found in ux_roles.yaml', $role));
    }
}
