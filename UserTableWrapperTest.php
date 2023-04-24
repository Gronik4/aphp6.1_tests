<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'UserTableWrapper.php';

class UserTableWrapperTest extends TestCase
{
    /**
     * @dataProvider providerInsert
     */
    public function testInsert($value, $expected): void {
        $res = new UserTableWrapper();
        $res->insert($value);
        $res_s = $res->get();
        $result = array_pop($res_s);
        $this-> assertEquals($expected, $result);
    }

    /**
     * @dataProvider providerUpdate
     */
    public function testUpdate(int $id, string $values, string $expected):void {
        $res = new UserTableWrapper();
        $res->update($id, $values);
        $res_s = $res->get();
        $result = $res_s[$id];
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider providerDelete
     */
    public function testDelete(int $id):void {
        $res = new UserTableWrapper();
        $res_s1 = $res->get();
        $expected = count($res_s1);
        echo $expected;
        $res->delete($id);
        $res_s = $res->get();
        $result = count($res_s);
        echo $result;
        $this->assertNotEquals($expected, $result);
    }
    public static function providerInsert():array {
        return [
            'test1'=>  ['Petrov', 'Petrov'],
            'test2'=>  ['Defoe', 'Defoe'],
            'test3'=>  ['Twain', 'Twain'],
        ];
    }
    public static function providerUpdate(): array {
        return [
            'test1'=>  [1, 'Petrov', 'Petrov'],
            'test2'=>  [2, 'Defoe', 'Defoe'],
            'test3'=>  [1, 'Twain', 'Twain'],
        ];
    }
    public static function providerDelete():array {
        return [
            ['test1'=> 1],
            ['test2'=> 2],
            ['test3'=> 3],
        ];
    }
}