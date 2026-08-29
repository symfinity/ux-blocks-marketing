<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksMarketing\Motion\MotionPropResolver;
use Symfinity\UxBlocksMarketing\Motion\RoleMotionConfig;
use Symfony\Component\Yaml\Yaml;

final class MotionPropTest extends TestCase
{
    #[Test]
    #[DataProvider('invalidMotionProvider')]
    public function invalidMotionCoercesToNone(string $role, string $motion): void
    {
        $presentation = MotionPropResolver::resolve($role, $motion);

        self::assertSame('none', $presentation->value);
        self::assertFalse($presentation->isActive());
        self::assertSame([], $presentation->dataAttributes);
    }

    /** @return array<string, array{0: string, 1: string}> */
    public static function invalidMotionProvider(): array
    {
        return [
            'hero unknown' => ['hero', 'spin'],
            'hero uppercase' => ['hero', 'Fade-Up'],
            'stats unknown' => ['stats-band', 'bounce'],
            'logo empty' => ['logo-cloud', ''],
        ];
    }

    #[Test]
    #[DataProvider('validHeroMotionProvider')]
    public function heroMotionBuildsPresentation(string $motion, bool $expectsStimulus): void
    {
        $presentation = MotionPropResolver::resolve('hero', $motion);

        self::assertSame($motion, $presentation->value);
        self::assertTrue($presentation->isActive());
        self::assertSame(['data-ui-motion' => $motion], $presentation->dataAttributes);
        self::assertStringContainsString('ux-motion-hero--' . $motion, $presentation->cssClasses[0]);

        if ($expectsStimulus) {
            self::assertNotNull($presentation->stimulusController);
        } else {
            self::assertNull($presentation->stimulusController);
        }
    }

    /** @return array<string, array{0: string, 1: bool}> */
    public static function validHeroMotionProvider(): array
    {
        return [
            'fade-up' => ['fade-up', false],
            'blur-in' => ['blur-in', false],
            'gradient-shift' => ['gradient-shift', false],
        ];
    }

    #[Test]
    public function statsCountUpRequiresStimulus(): void
    {
        $presentation = MotionPropResolver::resolve('stats-band', 'count-up');

        self::assertSame('count-up', $presentation->value);
        self::assertNotNull($presentation->stimulusController);
        self::assertSame('count-up', $presentation->stimulusValues['mode-value']);
    }

    #[Test]
    public function registryRowCountUnchangedFromCatalogBaseline(): void
    {
        $registry = Yaml::parseFile(\dirname(__DIR__, 2) . '/config/ux_roles.yaml');
        $roles = array_column($registry['roles'], 'role');

        self::assertSame(
            count($roles),
            count(array_unique($roles)),
            '049 MUST NOT add duplicate or new registry rows',
        );
        self::assertNotContains('motion', $roles);
        self::assertGreaterThanOrEqual(18, count($roles), '026 baseline had eighteen roles; 048 may extend count');
    }

    #[Test]
    public function matrixMatchesContract(): void
    {
        self::assertSame(
            ['none', 'fade-up', 'blur-in', 'gradient-shift'],
            RoleMotionConfig::allowedFor('hero'),
        );
        self::assertSame(
            ['none', 'count-up', 'stagger-fade'],
            RoleMotionConfig::allowedFor('stats-band'),
        );
        self::assertSame(
            ['none', 'marquee', 'stagger-in'],
            RoleMotionConfig::allowedFor('logo-cloud'),
        );
        self::assertSame(
            ['none', 'pulse-glow', 'slide-in'],
            RoleMotionConfig::allowedFor('cta-band'),
        );
        self::assertSame(
            ['none', 'hover-lift', 'stagger-reveal'],
            RoleMotionConfig::allowedFor('bento-grid'),
        );
    }

    #[Test]
    public function onlyMarketingMotionStimulusControllerExists(): void
    {
        $controllersDir = \dirname(__DIR__, 2) . '/assets/controllers';
        $files = glob($controllersDir . '/*_controller.js') ?: [];

        self::assertCount(1, $files);
        self::assertStringEndsWith('marketing_motion_controller.js', $files[0]);
    }
}
