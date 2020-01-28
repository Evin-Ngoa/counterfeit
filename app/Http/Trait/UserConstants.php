<?php


namespace App\Http\Traits;

interface UserConstants
{
    /**
     * Identifier for role for admin
     */
    const ROLE_ADMIN = 'Admin';

    /**
     * Identifier role for Managers
     */
    const ROLE_MANAGER = 'Manager';

    /**
     * Identifier for role for Supervisor
     */
    const ROLE_SUPERVISOR = 'Supervisor';

    /**
     * Identifier for role for Security Coordinator
     */
    const ROLE_SECURITY_COORDINATOR = 'Coordinator';

    /**
     * Identifier for role for Agents
     */
    const ROLE_AGENT = 'Agent';

    const JAMBO_PAY_SHARED_KEY = '6127482F-35BC-42FF-A466-276C577E7DF3';



}