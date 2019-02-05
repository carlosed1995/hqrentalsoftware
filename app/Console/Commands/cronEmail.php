<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;      
class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *  
     * @var string    
     */
    protected $description = 'Send an hour email to all the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    
 
      public function handle()
      {
 
       $user = User::all();
       
       foreach ($user as $a)
 
       {
 
        Mail::raw("This is automatically generated hour Update", function($message) use ($a)
 
        {
 
           $message->from('saquib.gt@gmail.com');
 
           $message->to($a->email)->subject('Hour Update');
 
         });
 
       }
 
 
 
          $this->info('Hour Update has been send successfully');
 
   }
}
