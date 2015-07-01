<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @package Aura.Filter
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Filter\Rule\Sanitize;

/**
 *
 * Validates that a value's length is within a given range.
 *
 * @package Aura.Filter
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
class StrlenBetween
{
    /**
     *
     * Sanitize
     *
     * @param int $min
     *
     * @param int $max
     *
     * @param string $pad_string
     *
     * @param int $pad_type
     *
     * @return bool True if the value was sanitized, false if not.
     *
     */
    public function __invoke($subject, $field, $min, $max, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
    {
        $value = $subject->$field;
        if (! is_scalar($value)) {
            return false;
        }
        if (strlen($value) < $min) {
            $subject->$field = str_pad($value, $min, $pad_string, $pad_type);
        }
        if (strlen($value) > $max) {
            $subject->$field = substr($value, 0, $max);
        }
        return true;
    }
}
