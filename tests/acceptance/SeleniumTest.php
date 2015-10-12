

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
		$I = new WebGuy($scenario);
		$I->wantTo('see GitHub word in title ');
		$I->amOnPage('/');
		$I->seeInTitle('GitHub');
    }
	
}

