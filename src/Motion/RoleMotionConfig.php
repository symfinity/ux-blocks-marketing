<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Motion;

final class RoleMotionConfig
{
    /** @var array<string, list<string>> */
    private const ALLOWED = [
        'hero' => ['none', 'fade-up', 'blur-in', 'gradient-shift'],
        'stats-band' => ['none', 'count-up', 'stagger-fade'],
        'logo-cloud' => ['none', 'marquee', 'stagger-in'],
        'cta-band' => ['none', 'pulse-glow', 'slide-in'],
        'bento-grid' => ['none', 'hover-lift', 'stagger-reveal'],
    ];

    /** @var array<string, string> */
    private const CLASS_PREFIX = [
        'hero' => 'ux-motion-hero--',
        'stats-band' => 'ux-motion-stats--',
        'logo-cloud' => 'ux-motion-logos--',
        'cta-band' => 'ux-motion-cta--',
        'bento-grid' => 'ux-motion-bento--',
    ];

    /** @return list<string> */
    public static function allowedFor(string $role): array
    {
        return self::ALLOWED[$role] ?? ['none'];
    }

    public static function classPrefixFor(string $role): string
    {
        return self::CLASS_PREFIX[$role] ?? 'ux-motion--';
    }

    public static function requiresStimulus(string $role, string $motion): bool
    {
        if ($motion === 'none') {
            return false;
        }

        return match ($role) {
            'stats-band' => $motion === 'count-up',
            'logo-cloud' => in_array($motion, ['marquee', 'stagger-in'], true),
            default => false,
        };
    }

    /** @return array<string, list<string>> */
    public static function matrix(): array
    {
        return self::ALLOWED;
    }
}
