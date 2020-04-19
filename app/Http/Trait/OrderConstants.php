<?php


namespace App\Http\Traits;

interface OrderConstants
{
    /**
     * Identifier for order for WAITING
     */
    const WAITING = 'WAITING';

    /**
     * Identifier order for PROCESSED
     */
    const PROCESSED = 'PROCESSED';

    /**
     * Identifier order for WAITING
     */
    const SHIP_WAITING = 'WAITING';

    /**
     * Identifier order for DISPATCHING
     */
    const SHIP_DISPATCHING = 'DISPATCHING';

    /**
     * Identifier order for SHIPPED_IN_TRANSIT
     */
    const SHIP_SHIPPED_IN_TRANSIT = 'SHIPPED_IN_TRANSIT';

    /**
     * Identifier order for CANCELED
     */
    const SHIP_CANCELED = 'CANCELED';

    /**
     * Identifier order for DELIVERED
     */
    const SHIP_DELIVERED = 'DELIVERED';
    
    /**
     * Identifier order for LOST
     */
    const SHIP_LOST = 'LOST';



}