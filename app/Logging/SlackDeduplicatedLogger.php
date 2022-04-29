<?php

namespace App\Logging;

use Monolog\Handler\DeduplicationHandler;
use Monolog\Handler\SlackWebhookHandler;
use Monolog\Logger;

class SlackDeduplicatedLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('slack_deduplicated');

        $slackHandler = new SlackWebhookHandler(
            $config['url'],
            $config['channel'] ?? null,
            $config['username'] ?? 'Laravel',
            $config['attachment'] ?? true,
            $config['emoji'] ?? ':boom:',
            $config['short'] ?? false,
            $config['context'] ?? true,
            Logger::DEBUG,
            $config['bubble'] ?? true,
            $config['exclude_fields'] ?? []
        );

        $logger->pushHandler(new DeduplicationHandler(
            $slackHandler,
            storage_path('logs/duplicates.log'),
            Logger::DEBUG,
            $config['time'] ?? 3600,
            true
        ));

        return $logger;
    }
}
