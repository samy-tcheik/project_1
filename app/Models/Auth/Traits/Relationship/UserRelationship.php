<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Event\EventType;
use App\Models\Event\Event;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }
    
    public function eventTypes()
    {
        return $this->hasMany(EventType::class,'created_by');
    }

    public function event()
    {
        return $this->hasMany(Event::class,'user_id');
    }
}
