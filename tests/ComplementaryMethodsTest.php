<?php
/**
 * User: erick.antunes
 * Date: 31/07/2018
 * Time: 10:07
 */

namespace Paggcerto\Tests;


use Paggcerto\Auth\Auth;
use Paggcerto\Paggcerto;

class ComplementaryMethodsTest extends TestCase
{
    public function testMustGetCities()
    {
        $paggcerto = new Paggcerto(new Auth(), "vL");
        $paggcerto->createNewSession();
        $cities = $paggcerto->city()->getRequest(["SE"]);

        $this->assertNotEmpty($cities);
        $this->assertTrue(count($cities) > 0);
    }

    public function testMustGetBussinesType()
    {
        $paggcerto = new Paggcerto(new Auth(), "vL");
        $paggcerto->createNewSession();
        $businessTypes = $paggcerto->businessType()->getRequest();

        $this->assertNotEmpty($businessTypes);
        $this->assertTrue(count($businessTypes) > 0);
    }

    public function testMustGetBanks()
    {
        $paggcerto = new Paggcerto(new Auth(), "vL");
        $paggcerto->createNewSession();
        $banks = $paggcerto->bank()->getRequest();

        $this->assertNotEmpty($banks);
        $this->assertTrue(count($banks) > 0);
    }

    public function testMustGetBusinessActivities()
    {
        $paggcerto = new Paggcerto(new Auth(), "vL");
        $paggcerto->createNewSession();
        $businessActivities = $paggcerto->businessActivity()->getRequest();

        $this->assertNotEmpty($businessActivities);
        $this->assertTrue(count($businessActivities) > 0);
    }
}