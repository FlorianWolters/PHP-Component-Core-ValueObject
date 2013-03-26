<?php
namespace FlorianWolters\Mock;

use \InvalidArgumentException;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\ValueObjectTrait;

/**
 * The class {@see Paint} demonstrates the usage of the trait {@see
 * ValueObjectTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-ValueObject
 * @since     Class available since Release 0.1.0
 */
final class Paint implements EqualityInterface
{
    use ValueObjectTrait;

    /**
     * The potion of red (`0-255`).
     *
     * @var integer
     */
    private $red;

    /**
     * The potion of green (`0-255`).
     *
     * @var integer
     */
    private $green;

    /**
     * The potion of blue (`0-255`).
     *
     * @var integer
     */
    private $blue;

    /**
     * This is paint for screens... No CMYK.
     *
     * @param integer $red   The potion of red (`0-255`).
     * @param integer $green The potion of green (`0-255`).
     * @param integer $blue  The potion of blue (`0-255`).
     *
     * @throws InvalidArgumentException If `$red` is not an integer between
     *                                  `0` and `255`.
     * @throws InvalidArgumentException If `$green` is not an integer between
     *                                  `0` and `255`.
     * @throws InvalidArgumentException If `$blue` is not an integer between
     *                                  `0` and `255`.
     */
    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * Sets the potion of red for this {@see Paint}.
     *
     * @param integer $red The potion of red (`0-255`).
     *
     * @return void
     * @throws InvalidArgumentException If `$red` is not an integer between
     *                                  `0` and `255`.
     */
    private function setRed($red)
    {
        $this->throwExceptionIfPotionIsInvalid($red);
        $this->red = $red;
    }

    /**
     * Throws an {@see InvalidArgumentException} if the specified value is not a
     * valid color potion for a {@see Paint}.
     *
     * @param mixed $value The value to check.
     *
     * @return void
     * @throws InvalidArgumentException If the value is not an integer between
     *                                  `0` and `255`.
     */
    private function throwExceptionIfPotionIsInvalid($value)
    {
        if ((false === \is_int($value)) || ($value > 255) || ($value < 0)) {
            throw new InvalidArgumentException(
                'The value must be an integer between 0 and 255.'
            );
        }
    }

    /**
     * Sets the potion of green for this {@see Paint}.
     *
     * @param integer $green The potion of green (`0-255`).
     *
     * @return void
     * @throws InvalidArgumentException If `$green` is not an integer between
     *                                  `0` and `255`.
     */
    private function setGreen($green)
    {
        $this->throwExceptionIfPotionIsInvalid($green);
        $this->green = $green;
    }

    /**
     * Sets the potion of blue for this {@see Paint}.
     *
     * @param integer $blue The potion of blue (`0-255`).
     *
     * @return void
     * @throws InvalidArgumentException If `$blue` is not an integer between
     *                                  `0` and `255`.
     */
    private function setBlue($blue)
    {
        $this->throwExceptionIfPotionIsInvalid($blue);
        $this->blue = $blue;
    }

    /**
     * Returns the potion of red for this {@see Paint}.
     *
     * @return integer The potion of red.
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * Returns the potion of green for this {@see Paint}.
     *
     * @return integer The potion of green.
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * Returns the potion of blue for this {@see Paint}.
     *
     * @return integer The potion of blue.
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * Mixes the specified {@see Paint} with this {@see Paint}.
     *
     * @param Paint $other The {@see Paint} to mix with this {@see Paint}.
     *
     * @return Paint The new {@see Paint}.
     */
    public function mix(self $other)
    {
        return new self(
            $this->integerAverage($this->red, $other->red),
            $this->integerAverage($this->green, $other->green),
            $this->integerAverage($this->blue, $other->blue)
        );
    }

    /**
     * Returns the average integer of the two specified integers.
     *
     * @param integer $a The first integer.
     * @param integer $b The second integer.
     *
     * @return integer The average integer.
     */
    private function integerAverage($a, $b)
    {
        return (int) (($a + $b) / 2);
    }
}
