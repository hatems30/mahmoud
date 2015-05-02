<?php

class StudentController extends Controller
{
	

    public function actionIndex()
	{               

                
           $this->render('index');
	}
        

	public function actionAdd()
	{               
            $connection=Yii::app()->db;   // assuming you have configured a "db" connection

            if(!empty($_GET)){
                $sql="INSERT INTO `student` (name) values ('{$_GET['name']}') ";
                $rowCount= $connection->createCommand($sql)->execute();// execute the non-query SQL
                echo "added";
            }
           
                $sql="SELECT
                        student.id,
                        student.`name`,
                        student.class_id
                        FROM
                        student
                        ";
                $data= $connection->createCommand($sql)->queryAll(); 
                foreach($data as $row){
                    var_dump($row);
                }
                
           $this->render('add');
	}

	
	public function actionUpdate()
	{
            var_dump($_GET);
           $this->render('update');
	}
}