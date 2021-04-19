<?php

namespace App\Observers;

use App\Models\Table;
use Illuminate\Support\Str;

class TableObserver
{
    /**
     * Handle the Table "creating" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function creating(Table $table)
    {
        $table->uuid = Str::kebab($table->uuid);
    }

    /**
     * Handle the Table "updating" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function updating(Table $table)
    {
        //
    }
}
