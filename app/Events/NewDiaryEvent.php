<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Diary;

class NewDiaryEvent extends Event
{
    use SerializesModels;

    public $diary;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Diary $diary)
    {
        $this->diary=$diary;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
