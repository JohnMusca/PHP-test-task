<?php

namespace Libs;

use Libs\Factories;

Class MailList 
{
    /**
     * @var string $name
     */
    private $name = 'Johns list';
    
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
    private $permission_reminder = 'Test';
    
    /**
     * @var array $campaign_defaults
     */
    private $campaign_defaults =  ["from_name"  => "Freddie",
                                   "from_email" => "freddie@freddiehats.com",
                                   "subject"    => "",
                                   "language"   => "en"];
                                
    /**
     * @var string $visibility
     */   
    private $visibility = "pub";
    
    /**
     * @var boolean $email_type_option
     */
    private $email_type_option = True;
    
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
        $this->mailChimp = \Libs\Factories\MailChimpFactory::create();
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
                 'email_type_option' => $this->email_type_option,
                 'visibility'        => $this->visibility];
        
        return $this->mailChimp->query($data, '/lists', 'POST')->id;
    }
    
    /**
     * Add Member.
     * 
     * @param Member $member  The member object to create.
     * @param String $list_id The list id.
     *
     * @return Boolean Returns True if successful, false if not.
     */
    public function addMember(\Libs\Member $member = null, $list_id = '')
    {
        $data = ['email_address' => $member->__get('email_address'),
                 'status'        => $member->__get('status'),
                 'email_type'    => $member->__get('email_type')];
        
        return $this->mailChimp->query($data, '/lists/' . $list_id . '/members', 'POST')->id;
    }
    
    /**
     * Update Member in the list.
     * 
     * @param Member $member    The member object to modify
     * @param string $list_id   The list id.
     * @param string $member_id The member id.
     *
     * @return Boolean Returns True if successful, false if not.
     */
    public function updateMember(\Libs\Member $member = null, $list_id = '', $member_id = '')
    {
        $data = ['email_address' => $member->__get('email_address'),
                 'status'        => $member->__get('status'),
                 'email_type'    => $member->__get('email_type')];
        
        return $this->mailChimp->query($data, '/lists/' . $list_id . '/members/' . $member_id, 'PATCH')->id;
    }
    
    /**
     * Magic method, get.
     * 
     * @param string $name The name of the private variable to access.
     * 
     * @return string The value of the variable accessed or false.
     */
    public function __get($name)
    {
        return (isset($this->$name) ? $this->$name : false);
    }
}