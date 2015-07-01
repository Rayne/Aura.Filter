<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Filter\Rule\Sanitize;

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
     * Fix to min length
     *
     * @param int $min
     *
     * @param string $pad_string
     *
     * @param int $pad_type
     *
     * @return bool True if the value was sanitized, false if not.
     *
     */
    public function __invoke($subject, $field, $min, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
    {
        $value = $subject->$field;
        if (! is_scalar($value)) {
            return false;
        }
        if (strlen($value) < $min) {
            $subject->$field = str_pad($value, $min, $pad_string, $pad_type);
        }
        return true;
    }
}
