<?php

namespace App\Traits;

use LogicException;

trait ImmutableTrait
{
    public function __get(string $name)
    {
        if (! property_exists($this, $name)) {
            throw new LogicException(sprintf(
                "property %s is not found in %s",
                $name,
                static::class
            ));
        }

        return $this->{$name};
    }
}
