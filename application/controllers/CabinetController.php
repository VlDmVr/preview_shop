<?php

class CabinetController extends LkController
{
    public function actionIndex()
    {
        $userId = User::checkSessionId();
        
        $userData = User::getUserById($userId);
        
        $this->render('cabinet_view', array('userData'=>$userData));
    }
    
    public function actionEdit()
    {
        $name = '';
        $email = '';
        
        $userId = User::checkSessionId();
        
        $userData = User::getUserById($userId);
        
        $name = $userData['name'];
        $email = $userData['email'];
        
        if($_POST['edit_submit'])
        {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            $errors = false;
            
            if(!User::checkName($name))
            {
                $errors[] = 'Имя должно быть больше 3 символов!';
            }
            if(!User::checkEmail($email))
            {
                $errors[] = 'Не корректный email!';
            }
            if(!User::checkPassword($password))
            {
                $errors[] = 'Пароль должен быть больше 5 символов!';
            }
            if(User::checkEmailExists($email))
            {
                $errors[] = 'Такой E-mail уже существует!';
            }
            
            if(!$errors)
            {
                $result = User::edit($userId, $name, $email, $password);
            }
            
        }
        
        $this->render('cabinet_edit_view', array('userData'=>$userData, 'errors'=>$errors, 'result'=>$result, 'name'=>$name, 'email'=>$email));
    }
}
