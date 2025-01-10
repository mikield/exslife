<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CometUserUpdate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'comet:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates User info.';

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
	public function fire()
	{
        $users = User::all();
        $redis = Redis::connection();
        foreach($users as $user){
        $redis->publish('userUpdate'.$user->id, json_encode(['theme'=>'success','title'=>'Привет, <b>'.$user->userFirstName.'</b>, прости но я буду появлятся каждые 20 секунд.']));
        }
        $this->info('Updated');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}
