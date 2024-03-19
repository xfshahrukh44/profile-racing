<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

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
    protected $fillable = ['question', 'answer'];

    public function ellipsisified_answer () {
        $maxChars = mb_strlen($this->answer) > 4 ? (mb_strlen($this->answer) / 4) :  mb_strlen($this->answer);
        $trimmedText = substr($this->answer, 0, $maxChars);
        $lastSpacePos = strrpos($trimmedText, ' ');

        if ($lastSpacePos !== false) {
            $trimmedText = substr($trimmedText, 0, $lastSpacePos);
        }

        return rtrim($trimmedText) . '...';
    }


}
