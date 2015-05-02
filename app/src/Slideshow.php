<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model {

    protected $table = 'slideshows';
    protected $primaryKey = 'slideshow_id';
    protected $guarded = ['slideshow_id'];


    /**
     * Establish an Eloquent relationship with the child Slide model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slides()
    {
        return $this->hasMany('fooCart\src\Slide', 'slideshow_id', 'slideshow_id');
    }

    /**
     * Get all slides belonging to a slideshow.
     * Order slides by the sequence column, ascending.
     *
     * @param $slideshow_id
     * @return mixed
     */
    public function getSlideshow($slideshow_id)
    {
        return $this->find($slideshow_id)->slides()->orderBy('sequence')->get();
    }
}
