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
    public function testIsOnlyFalse() {
        $this->assertFalse(is_only_false(true));
        $this->assertTrue(is_only_false(false));
        $this->assertTrue(is_only_false(0));
        $this->assertFalse(is_only_false(null));
        $this->assertTrue(is_only_false(0, true));
        $this->assertFalse(is_only_false(false, true));
    }
    public function testArrayContains() {
        $arrayA = array('foo', 'bar', 'baz');
        $arrayB = array('foo', 'bar');
        $arrayC = array('foo', 'apple');

        $this->assertTrue(array_contains($arrayA, $arrayB));
        $this->assertFalse(array_contains($arrayA, $arrayC));
        $this->assertTrue(array_contains($arrayA, 'bar'));
    }
    public function testArrayExclude() {
        $arrayA = array('foo', 'bar', 'baz');
        $arrayB = array('bar');
        $expected = array('foo', 'baz');
        $actual = array_exclude($arrayA, $arrayB);
        $this->assertEquals($expected, $actual);

        $arrayB = array('bar', 'baz');
        $expected = array('foo');
        $actual = array_exclude($arrayA, $arrayB);
        $this->assertEquals($expected, $actual);
    }
    public function testArrayToLi() {
        $arrayA = array('foo', 'bar', 'baz');
        $arrayB = array('foo');
        $this->assertEquals('<li>foo</li><li>bar</li><li>baz</li>', array_to_li($arrayA));
        $this->assertEquals('<li>foo</li>', array_to_li($arrayB));
    }
    public function testBoolToWord() {
        $this->assertEquals('Yes', bool_to_word(true));
        $this->assertEquals('Yes', bool_to_word(1));
        $this->assertEquals('Yep!', bool_to_word(1, 'Yep!:Nope!:Who Knows??'));
        $this->assertEquals('No', bool_to_word(false));
        $this->assertEquals('No', bool_to_word(0));
        $this->assertEquals('Nope!', bool_to_word(0, 'Yep!:Nope!:Who Knows??'));

        $this->assertEquals('N/A', bool_to_word(null));
        $this->assertEquals('Who Knows??', bool_to_word(null, 'Yep!:Nope!:Who Knows??'));

    }
    public function testModelName() {
        $this->assertEquals('Post', model_name('posts'));
        $this->assertEquals('PostPicture', model_name('post_pictures'));
    }
}