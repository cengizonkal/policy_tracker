<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class DeleteUser extends Command
{

    protected $signature = 'user:delete';
    protected $description = 'Delete user';

    public function handle()
    {
        $users = User::all();
        $selection = $this->choice('Select user to delete', $users->pluck('email')->toArray());
        User::where('email', $selection)->delete();
    }
}
