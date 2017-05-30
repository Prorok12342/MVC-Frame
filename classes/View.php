<?php
/**
 * Description of View
 *
 * @author BUIMOV ANDREY
 */
class View {
    protected $data = [];    
    
    public function __set($name, $value){
        $this->data[$name] = $value;
    }
    
    public function __get($name) {
        return $this->data[$name];
    }
    
    /**
     * Функция готовит шаблон к выводу (буферизация).
     */
    public function render($template){
        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
    
    public function display($template){
        echo $this->render($template);
    }
}