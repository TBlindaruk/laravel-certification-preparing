<?php
declare(strict_types = 1);

namespace App\Events;

use App\Model\Message;
use App\Model\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * Class MessageSent
 *
 * @package App\Events
 */
class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;
    
    /**
     * User that sent the message
     *
     * @var User
     */
    private $user;
    
    /**
     * Message details
     *
     * @var Message
     */
    private $message;
    
    /**
     * MessageSent constructor.
     *
     * @param User    $user
     * @param Message $message
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }
    
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
    
    /**
     * @return bool
     */
    public function broadcastWhen(): bool
    {
        return $this->message->message !== 'No';
    }
    
    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'message.created';
    }
    
    /**
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'user' => [
                'name' => $this->user->name,
            ],
            'message' => [
                'message' => $this->message->message,
            ],
        ];
    }
}
