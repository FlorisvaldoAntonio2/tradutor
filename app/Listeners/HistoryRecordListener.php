<?php

namespace App\Listeners;

use App\Events\TextTranslationEvent;
use App\Models\Translation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HistoryRecordListener
{
    protected Translation $translation;
    /**
     * Create the event listener.
     */
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    /**
     * Handle the event.
     */
    public function handle(TextTranslationEvent $event): void
    {
        $this->translation->create([
            'text_input' => $event->translation->text_input,
            'text_output' => $event->translation->text_output,
            'type' => $event->translation->type,
            'language_from' => $event->translation->language_from,
            'language_to' => $event->translation->language_to,
            'path_file' => $event->translation->path_file
        ]);
    }
}
