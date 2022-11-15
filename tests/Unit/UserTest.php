<?php
namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\UserController;
class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_name()
    {
        $user= new UserController("Ahmed", "moghazy@gmail.com");
        $this->assertEquals("Ahmed", $user->name());
        $newName= "Samy";
        $this->assertSame($newName, $user->name($newName));
    }
    public function test_email()
    {
        $user= new UserController("Ahmed", "moghazy@gmail.com");
        $this->assertEquals("Ahmed@gmail.com", $user->email());
        $newMail= "Samy@gmail.com";
        $this->assertEquals($newMail, $user->email($newMail));
    }
}
