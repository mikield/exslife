<?php

class VkTasksController extends \BaseController{

	public function all(){
		$taskList = Task::where('owner','!=',Auth::user()->id)
							->where('isDeleted','=',0)
							->where('isDone','=',0)
							->orderBy('pay','desc')
							->get();
        $resultTasks = $this->__generateTasksList($taskList);
        generatePage(
			View::make('tasks.vk.main')
				->with('resultTasks', $resultTasks)
				->withTitle('ВКонтакте: Все задания'),
			'ВКонтакте: Все задания'
			);
	}

	public function likes(){

	}

	public function clubs(){

	}






	public function __generateTasksList($tasks)
    {
        
            $this->tasks = $tasks;

            $this->done = Filter::where('userID','=',Auth::user()->account->id)->get()->toArray();


            if (!empty($this->tasks) && !empty($this->done)) {
                foreach ($this->done as $don) {
                    $done_ids[] = $don['taskID'];
                }
                foreach ($this->tasks as $task) {
                    $tasks_ids[] = $task['taskID'];
                }
                $list = array_diff($tasks_ids, $done_ids);
                sort($list);

                if (empty($list)) {
                    $list = '';
                }
                $resultTasks = Task::whereIn('taskID', $list)->orderBy('pay','desc')->get();
            } else {
                $resultTasks = $this->tasks;
            }
            return $resultTasks;

       

    }

	//Do task


	//Add task
    
    
    
   

}