<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Motion;

final class MotionPresentation
{
    public const STIMULUS_IDENTIFIER = 'symfony--ux-blocks-marketing--marketing-motion';

    /**
     * @param list<string>              $cssClasses
     * @param array<string, string>     $dataAttributes
     * @param array<string, string>     $stimulusValues
     */
    public function __construct(
        public readonly string $value,
        public readonly array $cssClasses,
        public readonly array $dataAttributes,
        public readonly ?string $stimulusController,
        public readonly array $stimulusValues,
    ) {
    }

    public function isActive(): bool
    {
        return $this->value !== 'none';
    }

    public function stimulusDataPrefix(): string
    {
        return self::STIMULUS_IDENTIFIER;
    }
}
