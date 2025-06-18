<?php

namespace App\AiAgents;

use LarAgent\Agent;
use LarAgent\Attributes\Tool;
use Illuminate\Support\Facades\Storage;

class ReplyAgent extends Agent
{
    protected $model = 'gpt-4.1-2025-04-14';

    protected $history = 'in_memory';

    protected $provider = 'default';

    protected array $review;

    public function instructions()
    {
        return view('prompts.reply_agent.instructions');
    }

    public function prompt($message)
    {
        return view('prompts.reply_agent.prompt', ['id' => $this->review['id'], 'content' => $this->review['comment']]);
    }

    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }

    #[Tool("Reply to a review", [
        'id' => 'ID of the review',
        'reply' => 'Reply text to the review',
    ])]
    public static function replyToReview(int $id, string $reply) {
        Storage::put("replies/review-$id.txt", $reply);
        return "Successfully replied to review $id";
    }
}
