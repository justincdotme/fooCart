<?php namespace fooCart\src;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    protected $primaryKey = "user_id";
    protected $guarded = ['remember_token'];
    protected $hidden = ['password', 'remember_token'];


    /**
     * Use Carbon to output timestamps in human readable format.
     * @param $attr
     * @return null|string
     */
    protected function getHumanTimestampAttribute($attr)
    {
        if ($this->attributes[$attr]) {
            return Carbon::parse($this->attributes[$attr])->diffForHumans();
        }

        return null;
    }

    /**
     * Output the updated_at timestamp in human readable format.
     * @return null|string
     */
    public function getHumanUpdatedAt()
    {
        return $this->getHumanTimestampAttribute("updated_at");
    }
}