<?php
namespace SimpleCMS\Nickname\Tests;

use SimpleCMS\Nickname\Packages\Nickname;

class NicknameTest extends \PHPUnit\Framework\TestCase
{

    public function testNickname()
    {
        $bank = new Nickname();

        $single = $bank->generate();
        $this->assertIsString($single);

        $list = $bank->generate(10);
        $this->assertIsArray($list);
    }
}