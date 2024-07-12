<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Track;
use Exception;
use App\Jobs\ClearPlayCount as JobsClearPlayCount;

class ClearPlayCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-play-count {argument} {--option} {--option2=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all tracks play count to 0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info($this->argument('argument'));
        $this->info($this->option('option') ? 'Vrai' : 'Faux');
        $this->info($this->option('option2') ?? 'Vrai');

        /* try {
            Track::where('play_count', '>', 0)->update(['play_count' => 0]);
        } catch (Exception $error){
            return $this->fail('An error occurred');
        } */
        JobsClearPlayCount::dispatch('argument');

        $this->info('Tracks update');
        return 0;
    }
}
