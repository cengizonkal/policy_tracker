<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class CreateUserCommand extends Command
{

    protected $signature = 'user:create';
    protected $description = 'Create a user';

    public function handle()
    {
        $name = $this->ask('Enter Name');
        $email = $this->ask('Enter User Email');
        $password = $this->ask('Enter Password');

        $validator = \Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $this->output->writeln($validator->errors()->toJson());
            exit("bye..\n");
        }

        $user = new \App\User();
        $user->password = \Hash::make($password);
        $user->email = $email;
        $user->name = $name;
        $user->save();
        $this->output->writeln('User Created');
    }
}
