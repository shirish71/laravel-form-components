<?php

namespace Shirish71\LaravelFormComponents\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    private function setValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    )
    {
        if ($this->isWired()) {
            return;
        }

        $inputName = static::convertBracketsToDots($name);

        if (!$language) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            return $this->value = old($inputName, $default);
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }


        $this->value = old("{$inputName}.{$language}", $default);
    }
}
