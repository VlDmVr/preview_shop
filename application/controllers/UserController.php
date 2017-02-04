<?php

class UserController extends Controller
{
    public function actionRegistration()
    {
        if($_POST['reg_submit'])
        {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $ban = 0;
            $date = date('H:i:s d-m-Y');
            $role = 'user';
            
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
                $result = User::register($name, $email, $password, $ban, $date, $role);
                if($result)
                {
                    header('Location: /user/good_reg');
                }
            }
        }
        $this->render('user_reg_view', array('name'=>$name, 'email'=>$email, 'password'=>$password, 'errors'=>$errors, 'result'=>$result));
    }
    
    public function actionAuth()
    {
        if($_POST['auth_submit'])
        {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            $errors = false;
            
             if(!User::checkEmail($email))
            {
                $errors[] = 'Не корректный email!';
            }
            if(!User::checkPassword($password))
            {
                $errors[] = 'Пароль должен быть больше 5 символов!';
            }
            
            if(!$errors)
            {
                $userId = User::addUserSession($email, $password);
            }  
            
            if($userId)
            {               
                if($_SESSION['role'] == 'admin')
                {
                    header('Location: /');
                }
                else
                {
                    header('Location: /cabinet');
                }
 
            }
            else
            {
                $errors[] = 'Такого пользователя нет! Введите данные заново!';
            }
        }
        
        $this->render('user_auth_view', array('errors'=>$errors, 'email'=>$email, 'password'=>$password));
    }
    
    public function actionExit()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['role']);
        header('Location: /');
    }
    
    public function actionGood_reg()
    {
        $this->render('good_reg_view');
    }
}

