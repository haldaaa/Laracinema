<?php

class AuthTest extends TestCase
{


    public function testAuthPage()
    {

        $this->visit('auth/login')
            ->see('Email')
            ->see('Password');

    }



}