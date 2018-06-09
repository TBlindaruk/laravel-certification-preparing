<?php

namespace App\Console\Commands;

use App\User\CreateCommand;
use Illuminate\Console\Command;

/**
 * Class CreateUser
 *
 * @package App\Console\Commands
 */
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {name} {password} {email}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $createCommand = new CreateCommand($arguments['name'], $arguments['password'], $arguments['email']);
        
        $user = $createCommand->execute();
        
        $this->info('User successfully created');
        $this->comment('token: ' . $user->tokens()->first()->id);
        $this->comment('name: ' . $user->name);
        $this->comment( 'email: ' . $user->email);
        
        return true;
    }
}
