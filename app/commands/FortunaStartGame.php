<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FortunaStartGame extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'fortuna:startGame';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Starts the fortuna Game.';

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
		
        $usersCount = count(FortunaGame::all());
        if($usersCount > 0){
            $number = rand(1,$usersCount);
            $userGameInfo = FortunaGame::find($number);
            $user = User::find($userGameInfo->userID);
            $money = 50*$usersCount;
            if($money < 300){
                $money = 300;
            }
            $user->balanse = $user->balanse + $money;
            $user->save();
            Fortuna::create([
            'userID'=> $user->id,
            'winnerCount' => $money,
            'winnerNumber' => $number,
            ]);
            /*
            Balanse::create([
            'type' => '+',
            'userID' => $user->id,
            'count'=> $money,
            'message' => 'За победу в фортуне',
            ]);
            */
            DB::table('fortunaGame')->truncate();
            // Очистка ежедневного бонуса
            DB::table('dayBonus')->truncate();
        }
        $this->info('Fortuna Game done');
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
