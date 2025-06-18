<?php

namespace App\AiAgents;

use LarAgent\Agent;

class SentimentChecker extends Agent
{
    protected $model = 'gpt-4.1-nano-2025-04-14';

    protected $history = 'in_memory';

    protected $provider = 'default';

    protected $responseSchema = [
        'name' => 'sentiment_info',
        'schema' => [
            'type' => 'object',
            'properties' => [
                'sentiment' => [
                    'type' => 'boolean',
                    'description' => 'Sentiment of the review, True for positive and False for negative'
                ],
            ],
            'required' => ['sentiment'],
            'additionalProperties' => false,
        ],
        'strict' => true,
    ];

    public function instructions()
    {
        return "You are a sentiment checker. You will be given a review and you will have to check the sentiment of the review.";
    }

    public function prompt($message)
    {
        return $message;
    }
}
