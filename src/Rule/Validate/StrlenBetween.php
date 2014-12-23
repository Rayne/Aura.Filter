<?php
/**
 *
 * This file is part of the Aura project for PHP.
 *
 * @package Aura.Filter
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Filter\Rule;

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
     * Validates that the length of the value is within a given range.
     *
     * @param mixed $min The minimum valid length.
     *
     * @param mixed $max The maximum valid length.
     *
     * @return bool True if valid, false if not.
     *
     */
    public function validate($object, $field, $min, $max)
    {
        $value = $object->$field;
        if (! is_scalar($value)) {
            return false;
        }
        $len = strlen($value);

        return ($len >= $min && $len <= $max);
    }

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
    public function sanitize($object, $field, $min, $max, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
    {
        $value = $object->$field;
        if (! is_scalar($value)) {
            return false;
        }
        if (strlen($value) < $min) {
            $object->$field = str_pad($value, $min, $pad_string, $pad_type);
        }
        if (strlen($value) > $max) {
            $object->$field = substr($value, 0, $max);
        }

        return true;
    }
}
