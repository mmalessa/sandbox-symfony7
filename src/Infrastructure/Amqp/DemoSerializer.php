<?php

declare(strict_types=1);

namespace App\Infrastructure\Amqp;

use App\Application\Message\DemoMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class DemoSerializer implements SerializerInterface
{
    public function decode(array $encodedEnvelope): Envelope
    {
        $body = $encodedEnvelope['body'];
        $headers = $encodedEnvelope['headers'];
        $message = new DemoMessage($body, $headers);
        return Envelope::wrap($message);
    }

    public function encode(Envelope $envelope): array
    {
        /** @var DemoMessage $message */
        $message = $envelope->getMessage();
        $body = $message->body;
        $headers = $message->headers;
        return [
            'body' => $body,
            'headers' => $headers,
        ];
    }
}
