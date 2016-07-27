<?php

namespace Libs;

Class MailListManager
{
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
    public function createList(\Libs\MailList $mailList = Null)
    {
        //construct data to send
        $data = ['name' => $mailList->__get('name'),
                'contact' => $mailList->__get('contact'),
                'permission_reminder' => $mailList->__get('permission_reminder'),
                'campaign_defaults' => $mailList->__get('campaign_defaults'),
                'email_type_option' => $mailList->__get('email_type_option'),
                'visibility'        => $mailList->__get('visibility')];
    
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
    public function addMember(\Libs\Member $member = Null, $list_id = '')
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
}