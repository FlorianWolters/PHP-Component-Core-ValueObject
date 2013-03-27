<?php
namespace FlorianWolters\Component\Core;

use \ReflectionClass;

/**
 * Test class for {@see ValueObjectTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-ValueObject
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Core\ValueObjectTrait
 */
class ValueObjectTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ReflectionClass
     */
    private $reflectedTrait;

    /**
     * @var string[]
     */
    private $usedTraitNames;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $traitName = __NAMESPACE__ . '\ValueObjectTrait';
        $this->reflectedTrait = new ReflectionClass($traitName);
        $this->usedTraitNames = $this->reflectedTrait->getTraitNames();
    }

    /**
     * @return void
     *
     * @group specification
     * @test
     */
    public function testIsUserDefinedTrait()
    {
        $this->assertTrue($this->reflectedTrait->isUserDefined());
        $this->assertTrue($this->reflectedTrait->isTrait());
    }

    /**
     * @return void
     *
     * @group specification
     * @test
     */
    public function testUsesImmutableTrait()
    {
        $expected = __NAMESPACE__ . '\ImmutableTrait';
        $this->assertContains($expected, $this->usedTraitNames);
    }

    /**
     * @return void
     *
     * @group specification
     * @test
     */
    public function testUsesValueEqualityTrait()
    {
        $expected = __NAMESPACE__ . '\ValueEqualityTrait';
        $this->assertContains($expected, $this->usedTraitNames);
    }
}
