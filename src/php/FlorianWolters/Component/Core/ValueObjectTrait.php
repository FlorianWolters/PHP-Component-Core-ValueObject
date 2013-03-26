<?php
namespace FlorianWolters\Component\Core;

/**
 * The trait {@see ValueObjectTrait} implements the *Value Object*
 * implementation pattern.
 *
 * A *Value Object* is a *simple* entity with the following properties:
 *
 * * The equality of a *Value Object* is not based on identity.
 * * A *Value Object* is immutable.
 *
 * Two *Value Objects* are *equal* when they have the *same* value, not
 * necessarily being the *same object*.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-ValueObject
 * @since     Trait available since Release 0.1.0
 */
trait ValueObjectTrait
{
    use ImmutableTrait, ValueEqualityTrait;
}
