<?php
/**
 * Created by PhpStorm.
 * User: pebo
 * Date: 01.05.2017
 * Time: 18:59
 */
class StatsCommand extends \yupe\components\ConsoleCommand
{
    /**
     * @param $limit integer количество записей для выбора из таблицы users
     */
    public function actionIndex($limit = 100)
    {
        echo "Вывод списка представленных в таблице 'users' почтовых доменов с количеством пользователей по каждому домену" . PHP_EOL;
        echo "Выбираем по " . $limit . " записей из таблицы 'users'" . PHP_EOL;
        $offset = 0;
        $stats = [];
        for($i=0 ; ; $i++)
        {
            $users = Yii::app()->db->createCommand()
                ->select('id, email')
                ->from('yupe_user_user')
                ->where('id > 0')
                ->limit($limit)
                ->offset($offset)
                ->queryAll()
            ;
            foreach ($users as $user)
            {
                $emails = explode(",",$user['email']);
                foreach($emails as $email)
                {
                    $domain = substr($email, (strpos($email, '@') + 1));
                    if(array_key_exists($domain,$stats))
                    {
                        $stats[$domain]++;
                    }else{
                        $stats[$domain] = 1;
                    }
                }
            }
            if(count($users) == 0)
            {
                break;
            }
            $offset = $offset + $limit;
        }
        print_r($stats);
    }
}
