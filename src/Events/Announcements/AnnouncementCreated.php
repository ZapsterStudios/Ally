<?php

namespace ZapsterStudios\Ally\Events\Announcements;

use Illuminate\Queue\SerializesModels;
use ZapsterStudios\Ally\Models\Announcement;

class AnnouncementCreated
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  \ZapsterStudios\Ally\Models\Announcement  $announcement
     * @return void
     */
    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }
}
