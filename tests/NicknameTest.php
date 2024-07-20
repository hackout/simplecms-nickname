<?php
namespace SimpleCMS\Nickname\Tests;

use SimpleCMS\Nickname\Packages\Nickname;

class NicknameTest extends \PHPUnit\Framework\TestCase
{

    public function testNickname()
    {
        $nickname = new Nickname();

        $single = $nickname->generate();
        $this->assertIsString($single);

        $list = $nickname->generate(10);
        $this->assertIsArray($list);
    }
}