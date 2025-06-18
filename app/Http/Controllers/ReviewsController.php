<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AiAgents\SentimentChecker;
use App\AiAgents\ReplyAgent;

class ReviewsController extends Controller
{

    protected array $comments = [
        [
            'id' => 1,
            'comment' => 'I love this product. It is the best I have ever used.',
        ],
        [
            'id' => 2,
            'comment' => 'The quality is terrible and not worth the price at all.',
        ],
        [
            'id' => 3,
            'comment' => 'Excellent customer service and fast delivery!',
        ],
        [
            'id' => 4,
            'comment' => 'Stopped working after just one week. Very disappointed.',
        ],
        [
            'id' => 5,
            'comment' => 'This exceeded all my expectations. Perfect purchase!',
        ],
        [
            'id' => 6,
            'comment' => 'The user interface is confusing and not intuitive at all.',
        ],
        [
            'id' => 7,
            'comment' => 'The product arrived damaged and customer support was unhelpful.',
        ],
        // [
        //     'id' => 8,
        //     'comment' => 'Amazing value for money. Would definitely recommend!',
        // ],
        // [
        //     'id' => 9,
        //     'comment' => 'The performance is much slower than advertised.',
        // ],
        // [
        //     'id' => 10,
        //     'comment' => 'The mobile app crashes frequently, making it unusable.',
        // ]
    ];

    public function index()
    {
        foreach ($this->comments as $comment) {
            $response = SentimentChecker::for('sentiment_check')->respond($comment['comment']);
            if ($response['sentiment']) {
                echo "Reacted with Red Heart" . "<br><br>";
            } else {
                ReplyAgent::for('example')->setReview($comment)->respond();
            }
        }
    }
}
