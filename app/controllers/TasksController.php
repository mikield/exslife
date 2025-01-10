<?php

class TasksController extends \BaseController{
    
    //Hide Task
    public function hide(){
        $taskID = Input::get('taskID');
        // Посмотрим или мы уже скрывали задание
        $hideInfo = Filter::where('taskID','=',$taskID)->where('userID','=',Auth::user()->account->id)->get()->toArray();
        if(empty($hideInfo)){
          Filter::create([
            'taskID'=>$taskID,
            'userID' => Auth::user()->account->id,
            'hidden' => true
          ]);
          Message('success','Вы успешно скрыли задание');
        }else{
            Message('error','Вы уже прятали задание');
        }
    }
    
    //Report task
    public function report(){
        $reson = Input::get('reson');
        $taskID = Input::get('taskID');
        if(!empty($reson)){
            $reportUser = DB::table('taskReport')->where('userID','=',Auth::user()->id);
        }
        Message('success','');
    }
    
    public function showReportModal(){
        $taskID = Input::get('taskID');
        $taskInfo = Task::find($taskID);
        if(!empty($taskInfo)){
           switch($taskInfo->type){
            case'1':
                $taskTitleType = 'Добавить в друзья <b>'.$taskInfo->friendName.'</b>';
            break;
            case"2":
                $taskTitleType = 'Вступить в <b>'.$taskInfo->clubName.'</b>';
            break;
            case"3":
                switch($taskInfo->likeType){
                    case"photo": $lT = 'фотографии'; break;
                    case"video": $lT = 'видеозаписи'; break;
                    case"wall": $lT = 'записе'; break;
                    case"comment": $lT = 'комментарии'; break;
                }
                $taskTitleType = 'Поставить "Мне нравится" на <b>'.$lT.'</b>';
            break;
            default:
            $taskTitleType = 'Неизвестно';
            break;
           }
           
            
            
            Message('success','',[
                'modalTitle'=>'Пожаловаться на задание: '.$taskTitleType,
                'modalBody'=> Form::radio('reson', 'rules').' <b>Нарушение правил сайта</b>
                        <br>'.Form::radio('reson', 'porn').' <b>Порнография</b><br>'.
                              Form::radio('reson', 'country').' <b>Нарушение законов государства</b>',
                'modalFooter'=>'
                <button type="button" onclick="tasks.__report('.$taskID.');" class="btn btn-info">Пожаловатся</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                '
                ]);
        }else{
           Message('error','Что-то не так...'); 
        }
    }
    
    
}