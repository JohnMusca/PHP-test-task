<?php

namespace Manager;

use Manager\Libs\Factories;

Class MailList 
{
    /**
     * Local instance of the maillist dataconnector
     * 
     * @var \MailChimp
     */
    private static $mailChimp;
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->$mailChimp = \Manager\Libs\Factories\MailChimpFactory::create();
    }
    
    /**
     * Create list.
     * 
     * @return Boolean Returns True if successful, false if not.
     */
    public function createList()
    {
        return $this->$mailChimp->query();
    }
    
    /**
     * Add Member.
     * 
     * @param Member $member The member object to create.
     *
     * @return Boolean Returns True if successful, false if not.
     */
    public function addMember(Member $member = null)
    {
        
    }
    
    /**
     * Modify Member in the list.
     * 
     * @param Member $member The member object to modify
     *
     * @return Boolean Returns True if successful, false if not.
     */
    public function modifyMemberInList(Member $member = null)
    {
        
    }
}