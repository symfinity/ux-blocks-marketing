<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\MarketingRoleCatalog;

final class MarketingR2GuardTest extends TestCase
{
    #[Test]
    public function r2RolesDoNotAliasV0BannerOrStatsBand(): void
    {
        $roles = MarketingRoleCatalog::roles();

        self::assertContains('cookie-consent', $roles);
        self::assertContains('banner', $roles);
        self::assertContains('status-band', $roles);
        self::assertContains('stats-band', $roles);
        self::assertNotContains('consent-banner', $roles);
        self::assertNotContains('cookie-banner', $roles);
    }

    #[Test]
    public function packageTreeDoesNotReferenceMotionLibraries(): void
    {
        $paths = [
            \dirname(__DIR__, 2) . '/composer.json',
            \dirname(__DIR__, 2) . '/src',
            \dirname(__DIR__, 2) . '/templates',
        ];

        $forbidden = ['framer-motion', 'gsap', 'motion/react', 'scrollreveal'];

        foreach ($paths as $path) {
            if (is_file($path)) {
                $this->assertPathDoesNotContain($path, $forbidden);

                continue;
            }

            if (!is_dir($path)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            );

            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }

                if (preg_match('/\.(php|twig|json|js)$/', $file->getFilename()) === 1) {
                    $this->assertPathDoesNotContain($file->getPathname(), $forbidden);
                }
            }
        }
    }

    /**
     * @param list<string> $needles
     */
    private function assertPathDoesNotContain(string $path, array $needles): void
    {
        $contents = (string) file_get_contents($path);

        foreach ($needles as $needle) {
            self::assertStringNotContainsString(
                $needle,
                $contents,
                sprintf('Forbidden motion reference "%s" in %s', $needle, $path),
            );
        }
    }
}
