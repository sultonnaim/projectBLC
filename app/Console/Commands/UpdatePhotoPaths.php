<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdatePhotoPaths extends Command
{
    protected $signature = 'photos:update-paths';
    protected $description = 'Update photo paths in database';

    public function handle()
    {
        DB::table('pengunjung_foto')->update([
            'path_foto' => DB::raw("REPLACE(path_foto, 'private/public/', '')")
        ]);

        $this->info('Photo paths updated successfully!');
    }
}