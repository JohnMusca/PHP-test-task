<?php

namespace Libs\Controllers;

use Libs\Factories;

Class MailChimpController
{

    /**
     * Instance of the maillist object.
     * 
     * @var \MailList
     */
    private $mailList = Null;
    
    /**
     * Instance of the member object.
     * 
     * @var \Member
     */
    private $member = Null;
    
    /**
     * Instance of mail list manager.
     * 
     * @var MailListManager $mailListManager
     */
    private $mailListManager = Null;
    
    /**
     * Default Constructor. Creates maillist and member objects to use
     */
    public function __construct()
    {
        //create instance of the maillistmanager object
        $this->mailListManager = \Libs\Factories\MailListManagerFactory::create();
        
        //create instance of the maillist object
        $this->mailList = \Libs\Factories\MailListFactory::create();
        
        //create instance of the member object
        $this->member = \Libs\Factories\MemberFactory::create();
    }
    
    /**
     * Method to execute the requirements: Create list, add member to list and update member to list.
     * 
     * @return void 
     */
    public function run()
    {
        //add List
        $list_id = $this->mailListManager->createList($this->mailList);
        
        //add member to list
        $member_id = $this->mailListManager->addMember($this->member, $list_id);
        
        //modify our member object
        $this->member->__set('email_type', 'text');
        
        //update member of list
        $this->mailListManager->updateMember($this->member, $list_id, $member_id);
    }
}