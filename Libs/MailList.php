<?php

namespace Manager;

use Manager\Libs\Factories;

Class MailList 
{
    /**
     * @var string $name
     */
    private $name = 'John\'s list';
    
    /**
     * @var array $contact
     */
    private $contact = ["company"  => "MailChimp",
                               "address1" => "675 Ponce De Leon Ave NE",
                               "address2" => "Suite 5000",
                               "city"     => "Atlanta",
                               "state"    => "GA",
                               "zip"      => "30308",
                               "country"  => "US",
                               "phone"    => ""];
    
    /**
     * @var string $permission_reminder
     */
    private $permission_reminder = '';
    
    /**
     * @var array $campaign_defaults
     */
    private $campaign_defaults =  ["from_name"  => "Freddie",
                                          "from_email" => "freddie@freddiehats.com",
                                          "subject"    => "",
                                          "language"   => "en"];
    
    /**
     * @var boolean $email_type_option
     */
    private $email_type_option = false;
    
    /**
     * Local instance of the maillist dataconnector
     * 
     * @var \MailChimp
     */
    private $mailChimp = Null;
    
    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->mailChimp = \Manager\Libs\Factories\MailChimpFactory::create();
    }
    
    /**
     * Create list.
     * 
     * @return Boolean Returns True if successful, false if not.
     */
    public function createList()
    {
        //construct data to send
        $data = ['name' => $this->name,
                 'contact' => $this->contact,
                 'permission_reminder' => $this->permission_reminder,
                 'campaign_defaults' => $this->campaign_defaults,
                 'email_type_option' => $this->email_type_option];
        
        return $this->mailChimp->query($data, '/lists', 'POST');
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