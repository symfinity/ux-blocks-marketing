<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

final class ForbiddenDependenciesTest extends TestCase
{
    private const FORBIDDEN = ['ux-toolkit', 'html_cva', 'tailwind_merge', 'symfony/ux-toolkit'];

    #[Test]
    public function packageTreeDoesNotReferenceForbiddenTooling(): void
    {
        $root = \dirname(__DIR__, 2);
        $paths = [
            $root . '/src',
            $root . '/templates',
            $root . '/composer.json',
        ];

        foreach ($paths as $path) {
            if (is_file($path)) {
                $this->assertFileDoesNotContainForbidden($path);

                continue;
            }

            if (!is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
            );

            /** @var SplFileInfo $file */
            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }

                $name = $file->getFilename();
                if (preg_match('/\.(php|twig|json|js)$/', $name) === 1) {
                    $this->assertFileDoesNotContainForbidden($file->getPathname());
                }
            }
        }
    }

    #[Test]
    public function composerDoesNotRequireExtendedOrToolkit(): void
    {
        $json = json_decode((string) file_get_contents(\dirname(__DIR__, 2) . '/composer.json'), true, 512, JSON_THROW_ON_ERROR);
        $require = array_keys($json['require'] ?? []);

        self::assertContains('symfinity/ux-blocks-core', $require);
        self::assertNotContains('symfinity/ux-blocks-extended', $require);
        self::assertNotContains('symfony/ux-toolkit', $require);
    }

    private function assertFileDoesNotContainForbidden(string $file): void
    {
        $contents = (string) file_get_contents($file);

        foreach (self::FORBIDDEN as $needle) {
            self::assertStringNotContainsString(
                $needle,
                $contents,
                sprintf('Forbidden reference "%s" in %s', $needle, $file),
            );
        }
    }
}
