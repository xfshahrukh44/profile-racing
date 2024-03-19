<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowTo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'how_tos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'image'];

    public function ellipsisified_description () {
        $maxChars = mb_strlen($this->description) > 4 ? (mb_strlen($this->description) / 4) :  mb_strlen($this->description);
        $trimmedText = substr($this->description, 0, $maxChars);
        $lastSpacePos = strrpos($trimmedText, ' ');

        if ($lastSpacePos !== false) {
            $trimmedText = substr($trimmedText, 0, $lastSpacePos);
        }

        return rtrim($trimmedText) . '...';
    }


}
