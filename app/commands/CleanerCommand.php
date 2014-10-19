<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CleanerCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:cleaner';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
        $current_date = new DateTime();
        $drawings = Firebase::get('/draw1/drawings');
        foreach($drawings as $key => $eachDrawing)
        {
            //print_r($eachDrawing['data']);
            $date=new DateTime($eachDrawing['data']['date_created']);
            $interval = date_diff($date, $current_date);

            $interval_days=$interval->format('%d');
            print($interval_days);
            if($interval_days>3)
            {
                Firebase::delete('/draw1/drawings/'.$key);
                print("deleted ".$key."!\n");
            }
        }
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
