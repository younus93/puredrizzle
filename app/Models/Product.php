<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

protected $fillable=['name','slug','product_description_short','product_description','product_categories','brand_id','status'];


/* Price Related History */

   public function productHistory()
    {
        return $this->hasMany(ProductHistory::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

   public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function productOrder()
    {
		return $this->hasMany(ProductOrder::class);
    }

    public function productCategory()
    {
        //product_categories
		return $this->belongsTo(ProductCategory::class);

    }

   public function productBrand()
    {
        //brand_id
		return $this->belongsTo(Brand::class);

    }

    function createdBy()
    {
        //created_by
        return $this->belongsTo(User::class,'created_by');
    }

}
