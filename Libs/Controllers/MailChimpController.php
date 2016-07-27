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
     * Default Constructor. Creates maillist and member objects to use
     */
    public function __construct()
    {
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
        $list_id = $this->mailList->createList();
        
        //add member to list
        $member_id = $this->mailList->addMember($this->member, $list_id);
        
        //modify our member object
        $this->member->__set('email_type', 'text');
        
        //update member of list
        $this->mailList->updateMember($this->member, $list_id, $member_id);
    }
}