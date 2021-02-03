<?php

namespace Filip785\MVC\Test;

use PHPUnit\Framework\TestCase;
use Filip785\MVC\ORM\TableHelpers;

class SampleTest extends TestCase
{
    public function testGetInsertStrSingle()
    {
        $expected = '(db_property) VALUES (?)';

        $actual = TableHelpers::getInsertStr(['db_property' => 'value']);

        $this->assertEquals($expected, $actual);
    }

    public function testGetInsertStrMultiple()
    {
        $expected = '(db_property1,db_property2) VALUES (?,?)';

        $actual = TableHelpers::getInsertStr(['db_property1' => 'value', 'db_property2' => 'value2']);

        $this->assertEquals($expected, $actual);
    }

    public function testGetWhereStrSingle()
    {
        $expected = 'db_property = ?';

        $actual = TableHelpers::getWhereStr(['db_property' => 'value']);

        $this->assertEquals($expected, $actual);
    }

    public function testGetWhereStrMultiple()
    {
        $expected = 'db_property1 = ? AND db_property2 = ?';

        $actual = TableHelpers::getWhereStr(['db_property1' => 'value', 'db_property2' => 'value2']);

        $this->assertEquals($expected, $actual);
    }

    public function testGetUpdateStrSingle()
    {
        $expected = 'db_property = ?';

        $actual = TableHelpers::getUpdateStr(['db_property' => 'value']);

        $this->assertEquals($expected, $actual);
    }

    public function testGetUpdateStrMultiple()
    {
        $expected = 'db_property1 = ?,db_property2 = ?';

        $actual = TableHelpers::getUpdateStr(['db_property1' => 'value', 'db_property2' => 'value']);

        $this->assertEquals($expected, $actual);
    }
}
