<?
    namespace App;
    use Controller\IndexController;
    use Controller\RedirectController;

    class App{

        public static function run()
        {
            $path = $_SERVER['REQUEST_URI'];
            if($path == "/"){
                $indexContoller = new IndexController();
                $indexContoller->actionIndex();
            }
            else{
                $redirectContoller = new RedirectController();
                $redirectContoller->actionRedirect($path);      
            }
            
        }
    }
       