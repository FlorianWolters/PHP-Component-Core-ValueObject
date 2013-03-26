<?php
namespace FlorianWolters;

use FlorianWolters\Component\Core\ImmutableException;
use FlorianWolters\Mock\Paint;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * The class {@see ValueObjectExample} implements a simple command line
 * application to demonstrate the component
 * **FlorianWolters\Component\Core\ValueObject**.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-ValueObject
 * @since     Class available since Release 0.1.0
 */
final class ValueObjectExample
{
    /**
     * Runs the {@see ValueObjectExample}.
     *
     * @param integer  $argc The number of arguments.
     * @param string[] $argv The arguments.
     *
     * @return integer Always `0`.
     */
    public static function main($argc, array $argv = array())
    {
        $self = new self;
        $self->execute();

        return 0;
    }

    /**
     * @return void
     */
    private function execute()
    {
        $paint = new Paint(255, 255, 0);
        $otherPaint = new Paint(127, 127, 0);

        \var_dump($paint->equals($otherPaint));
        \var_dump($paint->equals(new Paint(255, 255, 255)));
        \var_dump($paint->equals(new Paint(255, 255, 0)));
        // TODO Type Juggling is used here. If the value object is self-validating this is NOT a problem, otherwise is IS a problem.
//        \var_dump($paint->equals(new Paint(255, 255, null)));

        $mixedPaint = $paint->mix(new Paint(0, 0, 0));
        \var_dump($mixedPaint->equals($otherPaint));
        \var_dump($mixedPaint->equals($mixedPaint));

        try {
            $paint->foo = 'foo';
        } catch (ImmutableException $ex) {
        }
    }
}

exit(ValueObjectExample::main($argc, $argv));
