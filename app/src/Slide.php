<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

    protected $table = 'slides';
    protected $primaryKey = 'slide_id';
    protected $guarded = ['slide_id', 'slideshow'];


    /**
     * Establish an Eloquent relationship with the parent Slideshow model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function slideshow()
    {
        return $this->belongsTo('fooCart\src\Slideshow', 'slideshow_id', 'slideshow_id');
    }
}
