<?php

/**
 * Description of News
 *
 * @author BUIMOV ANDREY
 */


//------------------------------------------------------------------------------

class News extends AbstractModel {
    public $id;
    public $title;
    public $text;
    
    protected static $table = 'news';
    protected static $class = 'News';  
}
