<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Filter\Rule\Validate;

/**
 *
 * Validates that a value is no longer than a certain length.
 *
 * @package Aura.Filter
 *
 */
class StrlenMin
{
    /**
     *
     * Validates that a string is no longer than a certain length.
     *
     * @param mixed $min The value must have no more than this many
     *                   characters.
     *
     * @return bool True if valid, false if not.
     *
     */
    public function __invoke($subject, $field, $min)
    {
        $value = $subject->$field;
        if (! is_scalar($value)) {
            return false;
        }

        return strlen($value) >= $min;
    }
}
