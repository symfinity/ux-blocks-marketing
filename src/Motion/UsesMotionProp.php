<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Motion;

trait UsesMotionProp
{
    public string $motion = 'none';

    abstract protected function motionRoleId(): string;

    public function getMotionPresentation(): MotionPresentation
    {
        return MotionPropResolver::resolve($this->motionRoleId(), $this->motion);
    }
}
