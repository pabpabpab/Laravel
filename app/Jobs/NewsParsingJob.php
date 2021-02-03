<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\NewsParser;
use Illuminate\Support\Facades\Storage;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        Storage::disk('parser_logs')
            ->append(
                'parsing.log',
                date("H:i:s"). " " . $this->source
            );

        $message = "success";
        try {
            $parser->loadAndSave($this->source);
        } catch (\Exception $e) {
            $message = "ERROR : " . $e->getMessage();
        } finally {
            Storage::disk('parser_logs')
                ->append('parsing.log', $message);
        }
    }
}
