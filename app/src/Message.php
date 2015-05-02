<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model {

    protected $table = 'messages';
    protected $primaryKey = "message_id";
    protected $guarded = ['message_id'];

    /**
     * Use Carbon to output timestamps in human readable format.
     *
     * @param $attr
     * @return null|string
     */
    protected function getHumanTimestampAttribute($attr)
    {
        if ($this->attributes[$attr])
        {
            return Carbon::parse($this->attributes[$attr])->diffForHumans();
        }

        return null;
    }

    /**
     * Output the created_at timestamp in human readable format.
     *
     * @return null|string
     */
    public function getHumanCreatedAt()
    {
        return $this->getHumanTimestampAttribute("created_at");
    }

    /**
     * Get the list of messages.
     * Sort by created_at timestamp.
     *
     * @return mixed
     */
    public function getSortedMessages()
    {
        return $this->orderBy('created_at', 'desc')->get();
    }
}
