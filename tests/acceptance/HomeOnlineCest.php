<?php
use \AcceptanceTester;

class HomeOnlineCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
		
    }
	
	
    /**
     * Test is home available
     *
     * @param AcceptanceTester $I
     */
    public function backendLogin(AcceptanceTester $I)
    {
        $I->wantTo('check if our frontend-home is available');
        $I->amOnPage('/');
        $I->see('Test_Joomla3x');
    }
	
}
