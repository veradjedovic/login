<?php 

namespace app\controllers;

/**
 * Description of Controller
 *
 * @author Vera
 */
abstract class Controller
{
    /**
     *
     * @var array
     */
	public $data = array();
        
    /**
     *
     * @var string
     */
	public $view;
        
    /**
     *
     * @param  string $view
     * @param array $data
     */
	public function view($view = "index", $data = null)
	{
		$this->view = $view;
		$content = '[VIEW]';
		
        if($this->layout) {
            ob_start();
            include APP_PATH . "views/index.php";
            $content = ob_get_clean();
        }

		ob_start();
			include APP_PATH . "views/{$view}.php";
		$contentSite = ob_get_clean();

		$page = str_replace('[VIEW]', $contentSite, $content);
        echo $page;
	}
}