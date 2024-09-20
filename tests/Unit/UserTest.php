<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }
    public function testl_user_email_domain_is_correct(){
        $user=new User(['email'=>'susu@lifestyle.com']);
        $this->assertEquals('lifestyle.com',$user->getEmailDomain());
    }
}
