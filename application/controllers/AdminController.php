<?php

class AdminController extends AdmController
{
    public function actionIndex()
    {
        $this->render('admin_view');
    }
    
    public function actionProducts($id=null)
    {
        $pages = new Pagination('autos', $id);
        $limit_items_arr = $pages->arrLimitItems;
        
        if(!empty($limit_items_arr))
        {
            $link_page = $pages->linkPage;           
        }
        else
        {
            header('Location:/admin/products/1');
        }

        if(!$id)
        {
            $id = 1;
        }
        
        $this->render('products_view', array('limit_items_arr'=>$limit_items_arr, 'link_page'=>$link_page, 'id'=>$id));
    }
    
    public function actionCreate_products()
    {
        $category = Category::getAllCategory();
        
        $errors = false;
        
        if($_POST['sub_create_product'])
        {
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $producer = $_POST['producer'];
            $status = $_POST['status'];
            $description = trim($_POST['description']);
            $img_str = 'image';
            $img_file = trim($_FILES[$img_str]['name']);
           
            $arr_folder_name = Category::getNameCategory($producer);
            
            $folder_name = 'autos/'.$arr_folder_name['name'];
            
            if(!Admin::checkInformation($name, $price, $producer, $status, $description))
            {
                $errors[] = 'Заполните все поля!';
            }
            
            if(!Admin::getImage($img_str, $folder_name))
            {
                $errors[] = 'Не удалось сохранить файл!';
            }
            
            if(!$errors)
            {
               $result = Autos::saveAutos($name, $price, $producer, $status, $description, $img_file);
            }
        }
        
        $this->render('create_view', array(
                                        'category'=>$category,
                                        'name' => $name,
                                        'price' => $price,
                                        'producer' => $producer,
                                        'status' => $status,
                                        'description' => $description,
                                        'image' => $image,
                                        'errors'=>$errors,
                                        'result'=>$result,
                                    ));
    }
    
    public function actionCategories()
    {
       $categories = Category::getAllCategory();
            
       $this->render('categories_view', array('categories'=>$categories));
    }
    
    public function actionCreate_categories()
    {
        $errors = false;
        
        if($_POST['sub_create_category'])
        {
            $name = trim(lcfirst($_POST['name']));
            $status = $_POST['status'];
            $logo = trim($_FILES['logo']['name']);
            $img_str = 'logo';
            $partial_path = 'logo';
            

            $folder_path = './images/autos/';
            
            if(!Category::checkCreateFolder($name, $logo))
            {
                $errors[] = 'Название категории или название файла логотипа категории должны совпадать и не быть пустыми!';
            }
            
            if(!Category::checkDir($folder_path, $name))
            {
                $errors[] = 'Такая директория уже существует!';
            }
            
            if(!$errors){
                
                mkdir($folder_path.$name.'/', 0700);
            }
            
            if(!Admin::getImage( $img_str, $partial_path))
            {
                $errors[] = 'Изображение не загружено!'; 
            }
            
            if(!$errors)
            {
                $result = Category::saveCategory($name, $status, $logo);
            }
        }
        
        $this->render('create_categories_view', array('errors'=>$errors, 'result'=>$result));
    }
    
    public function actionUpdate_product($id)
    {
        $arr_auto = Autos::getAutoById($id);
        
        $name = $arr_auto['name'];
        $price = $arr_auto['price'];
        $cat_id = $arr_auto['cat_id'];
        $status = $arr_auto['status'];
        $description = $arr_auto['description'];
        $img_data = $arr_auto['image'];;
        
        $category = Category::getAllCategory();
        $errors = false;
        
        if($_POST['sub_update_product'])
        {
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $producer = $_POST['producer'];
            $status = $_POST['status'];
            $description = trim($_POST['description']);
            
            $img_data = trim($_POST['image_data']);
            $img_file = trim($_FILES['image_new']['name']);
            $img_str = 'image_new';
   
            $arr_folder_name = Category::getNameCategory($producer);

            $folder_name = 'autos/'.$arr_folder_name['name'];

            if(!Admin::checkInformation($name, $price, $producer, $description))
            {
                $errors[] = 'Заполните все поля!';
            }

            if($img_file)
            {
                if(!Admin::deleteImage($img_data, $folder_name))
                {
                    $errors[] = 'Не удалось удалить файл!';
                }

                if(!Admin::getImage($img_str, $folder_name))
                {
                    $errors[] = 'Не удалось сохранить файл!';
                }  
            }

            if($img_data)
            {
                $image = $img_data;
            }
            else
            {
                $image = $img_file;
            }
            
            if(!$errors)
            {
                $result = Autos::updateProduct($id, $name, $price, $producer, $status, $description, $image);
            }  
        }
        
        $this->render('view_update_product', array('arr_auto'=>$arr_auto, 
                                                    'category'=>$category,
                                                    'cat_id'=>$cat_id,
                                                    'name' => $name,
                                                    'price' => $price,
                                                    'status' => $status,
                                                    'description' => $description,
                                                    'img_data' => $img_data,
                                                    'errors'=>$errors,
                                                    'result'=>$result,
                       ));
    }
    
    public function actionDelete_product($id)
    {
        $arr_auto = Autos::getAutoById($id);
        $image = $arr_auto['image'];
        $cat_id = $arr_auto['cat_id'];
        $category = Category::getNameCategory($cat_id);
        $folder_name = 'autos/'.$category['name'];
        
        if(Admin::deleteImage($image, $folder_name))
        {
            Autos::deleteAutoById($id); 
        }
        header('Location: /admin/products');
    }
    
    public function actionDelete_category($id)
    {
        
        $category = Category::getCategoryById($id);
        
        Category::deleteAutosDir($category['name']);
        
        if(Category::deleteCatImage($category['image']))
        {
            Category::deleteCategoruById($id);
        }
        header('Location: /admin/categories');
    }
}

