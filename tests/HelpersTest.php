<?php

class HelpersTest extends PHPUnit_Framework_TestCase {
    public function testSlugify() {
        $this->assertEquals('foo-bar', slugify('fooBar'));
        $this->assertEquals('foo-bar', slugify('foo-bar'));
        $this->assertEquals('foo-bar', slugify('foo_bar'));
    }
    public function testIsEmpty() {
        $this->assertTrue(is_empty(''));
        $this->assertTrue(is_empty('    '));
        $this->assertTrue(is_empty(null));
        $this->assertTrue(is_empty(false));

        $this->assertFalse(is_empty(0));
        $this->assertFalse(is_empty('foobar'));
        $this->assertFalse(is_empty(true));
    }
    public function testArrayContains() {
        $arrayA = array('foo', 'bar', 'baz');
        $arrayB = array('foo', 'bar');
        $arrayC = array('foo', 'apple');

        $this->assertTrue(array_contains($arrayA, $arrayB));
        $this->assertFalse(array_contains($arrayA, $arrayC));
        $this->assertTrue(array_contains($arrayA, 'bar'));
    }
}