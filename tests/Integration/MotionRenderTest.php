<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Integration;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksMarketing\Tests\Unit\Twig\Components\ComponentTestCase;

final class MotionRenderTest extends ComponentTestCase
{
    #[Test]
    public function heroNoneMatchesBaselineWithoutMotionAttributes(): void
    {
        self::bootKernel();
        $baseline = $this->renderComponent('Hero', [
            'headline' => 'Ship faster',
            'subheadline' => 'Marketing sections',
            'primaryActionLabel' => 'Start',
            'primaryActionHref' => '/start',
        ]);
        $explicitNone = $this->renderComponent('Hero', [
            'headline' => 'Ship faster',
            'subheadline' => 'Marketing sections',
            'primaryActionLabel' => 'Start',
            'primaryActionHref' => '/start',
            'motion' => 'none',
        ]);

        self::assertSame($baseline, $explicitNone);
        self::assertStringNotContainsString('data-ui-motion=', $baseline);
        self::assertStringNotContainsString('ux-motion-hero--', $baseline);
    }

    #[Test]
    #[DataProvider('heroMotionProvider')]
    public function heroMotionVariantsRenderAttributes(string $motion): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Hero', [
            'headline' => 'Ship faster',
            'motion' => $motion,
        ]);

        self::assertStringContainsString(sprintf('data-ui-motion="%s"', $motion), $html);
        self::assertStringContainsString('ux-motion-hero--' . $motion, $html);
        self::assertStringContainsString('data-controller="symfony--ux-blocks-marketing--marketing-motion"', $html);
    }

    /** @return array<string, array{0: string}> */
    public static function heroMotionProvider(): array
    {
        return [
            'fade-up' => ['fade-up'],
            'blur-in' => ['blur-in'],
            'gradient-shift' => ['gradient-shift'],
        ];
    }

    #[Test]
    public function statsCountUpAttachesStimulusController(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('StatsBand', ['motion' => 'count-up']);

        self::assertStringContainsString('data-ui-motion="count-up"', $html);
        self::assertStringContainsString('data-controller="symfony--ux-blocks-marketing--marketing-motion"', $html);
        self::assertStringContainsString('data-symfony--ux-blocks-marketing--marketing-motion-mode-value="count-up"', $html);
    }

    #[Test]
    #[DataProvider('logoMotionProvider')]
    public function logoCloudMotionVariantsRender(string $motion): void
    {
        self::bootKernel();
        $html = $this->renderComponent('LogoCloud', ['motion' => $motion]);

        self::assertStringContainsString(sprintf('data-ui-motion="%s"', $motion), $html);
        self::assertStringContainsString('ux-motion-logos--' . $motion, $html);
    }

    /** @return array<string, array{0: string}> */
    public static function logoMotionProvider(): array
    {
        return [
            'marquee' => ['marquee'],
            'stagger-in' => ['stagger-in'],
        ];
    }

    #[Test]
    #[DataProvider('cssOnlyOptionalMotionProvider')]
    public function optionalCssOnlyRolesRenderWithoutStimulus(string $component, string $motion, string $classPrefix): void
    {
        self::bootKernel();
        $html = $this->renderComponent($component, ['motion' => $motion]);

        self::assertStringContainsString(sprintf('data-ui-motion="%s"', $motion), $html);
        self::assertStringContainsString($classPrefix . $motion, $html);
        self::assertStringNotContainsString('data-controller="symfony--ux-blocks-marketing--marketing-motion"', $html);
    }

    /** @return array<string, array{0: string, 1: string, 2: string}> */
    public static function cssOnlyOptionalMotionProvider(): array
    {
        return [
            'cta pulse' => ['CtaBand', 'pulse-glow', 'ux-motion-cta--'],
            'cta slide' => ['CtaBand', 'slide-in', 'ux-motion-cta--'],
            'bento hover' => ['BentoGrid', 'hover-lift', 'ux-motion-bento--'],
        ];
    }

    #[Test]
    public function bentoStaggerRevealMayAttachOptionalStimulus(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoGrid', ['motion' => 'stagger-reveal']);

        self::assertStringContainsString('data-ui-motion="stagger-reveal"', $html);
        self::assertStringContainsString('ux-motion-bento--stagger-reveal', $html);
        self::assertStringContainsString('data-controller="symfony--ux-blocks-marketing--marketing-motion"', $html);
    }

    #[Test]
    public function reducedMotionCssGuardPresentInBaseStylesheet(): void
    {
        $css = (string) file_get_contents(\dirname(__DIR__, 2) . '/assets/styles/motion/_motion-base.css');

        self::assertStringContainsString('prefers-reduced-motion: reduce', $css);
        self::assertStringContainsString('animation: none !important', $css);
    }

    #[Test]
    public function stimulusControllerSkipsAnimationWhenReducedMotionDocumented(): void
    {
        $js = (string) file_get_contents(\dirname(__DIR__, 2) . '/assets/controllers/marketing_motion_controller.js');

        self::assertStringContainsString("matchMedia('(prefers-reduced-motion: reduce)')", $js);
        self::assertStringContainsString('showFinalValues', $js);
    }
}
