<?php namespace fooCart\src;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {

    protected $table = 'product_images';
    protected $primaryKey = 'image_id';
    protected $guarded = ['image_id'];

    /**
     * Establish an Eloquent relationship to the parent Product model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('fooCart\src\Product', 'product_id');
    }
}
