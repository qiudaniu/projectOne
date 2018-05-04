<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/5/4
 * Time: 15:05
 */

namespace App\Api\Transformers;


use App\Lesson;
use League\Fractal\TransformerAbstract;

class lessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lesson)
    {
        return [
            'id' => $lesson['id'],
            'title' => $lesson['title'],
            'body' => $lesson['body'],
        ];
    }
}