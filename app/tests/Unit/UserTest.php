<?php

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testUser(){
        $user = new User();
        $user->setFirstName('Aimen');
        $user->setLastName('Zemzmi');
        $user->setEmail('aimen.zemzmi@gmail.com');
        $user->setPassword("aimen");
        $user->setTag("testPourTag");
        $user->setPhoneNumber("06.06.06.06.06");
        $this->assertNotEmpty($user->getFirstName());
        $this->assertNotEmpty($user->getLastName());
        $this->assertNotEmpty($user->getPassword());
        $this->assertNotEmpty($user->getTag());
        $this->assertEquals('Aimen',$user->getFirstName());
        $this->assertEquals('Zemzmi',$user->getLastName());
        $this->assertEquals('aimen.zemzmi@gmail.com',$user->getEmail());
        $this->assertEquals('aimen',$user->getPassword());
        $this->assertEquals('testPourTag',$user->getTag());
        $this->assertEquals("06.06.06.06.06",$user->GetPhoneNumber());
        $this->assertRegExp('/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/',$user->getEmail());
        $this->assertEquals(true,$this->isValid($user));
    }

    public function isValid(User $user){
        if(count_chars($user->getPassword()) < 0 || empty($user->getPassword())){
            return "error Password";
        }
        if(count_chars($user->getTag()) < 0 || empty($user->getTag())){
            return "error Tag";
        }
        if(count_chars($user->getLastName()) < 0 || empty($user->getLastName())){
          return "error lastName";
        }
        if(count_chars($user->getFirstName()) < 0 || empty($user->getFirstName())){
            return "error firstName";
        }
        if(!filter_var($user->getEmail(),FILTER_VALIDATE_EMAIL) || empty($user->getEmail())){
          {
            return "error Email";
          }
        }
        return true;
      }
}