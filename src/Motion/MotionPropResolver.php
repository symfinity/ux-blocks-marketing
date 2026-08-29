<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Motion;

final class MotionPropResolver
{
    public static function resolve(string $role, string $motion): MotionPresentation
    {
        $trimmed = trim($motion);
        $allowed = RoleMotionConfig::allowedFor($role);

        if ($trimmed === '' || !in_array($trimmed, $allowed, true)) {
            $normalized = 'none';
        } else {
            $normalized = $trimmed;
        }

        if ($normalized === 'none') {
            return new MotionPresentation('none', [], [], null, []);
        }

        $prefix = RoleMotionConfig::classPrefixFor($role);
        $cssClasses = [$prefix . $normalized];
        $dataAttributes = ['data-ui-motion' => $normalized];
        $stimulusController = null;
        $stimulusValues = [];

        if (RoleMotionConfig::requiresStimulus($role, $normalized)) {
            $stimulusController = MotionPresentation::STIMULUS_IDENTIFIER;
            $stimulusValues['mode-value'] = $normalized;
        }

        return new MotionPresentation(
            $normalized,
            $cssClasses,
            $dataAttributes,
            $stimulusController,
            $stimulusValues,
        );
    }
}
