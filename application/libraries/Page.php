<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 27/04/2017
 * Time: 14:13
 */

class Page{

    protected $CI;
    private $data = array();

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->setTitle();
    }


    /**
     * Fungsi ini untuk mengatur title pada halaman html
     * @param $title String
     */

    public function setTitle($title = 'default'){
        $this->data['title'] = $title;
    }


    /**
     * @return mixed
     */
    public function generateTitle()
    {
        return $this->data['title'];
    }

    /**
     * Mengatur data yang akan di parsing ke view
     * @param $index kunci data
     * @param $value isi data
     */
    public function setData($index, $value= null)
    {
        if (!isset($this->data['content'])) {
            $this->data['content'] = array();
            $this->insertData($index, $value);
        } else {
            $this->insertData($index, $value);
        }
    }

    private function insertData($data, $value)
    {
        if(is_array($data)){
            foreach ($data as $item => $value) {
                $this->data['content'][$item] = $value;
            }
        }else{
            $this->data['content'][$data] = $value;
        }
    }


    /**
     * Mengambil data yang sudang di set/atur
     * @param $index String
     * @return data berdasarkan index
     */
    public function getData($index)
    {
        if(isset($this->data['content'][$index])){
            return $this->data['content'][$index];
        }
    }


    /**
     * Mengatur file css yang akan di load di page
     * @param $css path css
     */
    public function setLoadCss($css)
    {

        if (!isset($this->data['loadCss'])) {
            $this->data['loadCss']= array();

            $this->insertCss($css);
        } else {
            $this->insertCss($css);
        }


    }



    /**
     * menampilkan css yang sudah di set
     */
    public function generateCss()
    {

        if(isset($this->data['loadCss'])){
            foreach ($this->data['loadCss'] as $css) {
                echo "<link rel=\"stylesheet\" href=\"". site_url($css).".css\">".PHP_EOL;
            }
        }
    }

    /**
     * menginputkan data pada data css yang akan di tampilkan pada page
     * @param $css
     */
    public function insertCss($css)
    {
        $index = count($this->data['loadCss']);
        if (is_array($css)) {
            foreach ($css as $item) {
                $this->data['loadCss'][$index] = $item;
                $index++;
            }
        } else {
            $this->data['loadCss'][$index] = $css;
        }
    }

    public function setLoadJs($js)
    {
        if (!isset($this->data['loadJs'])) {
            $this->data['loadJs']= array();

            $this->insertJs($js);
        } else {
            $this->insertJs($js);
        }
    }

    private function insertJs($js)
    {
        $index = count($this->data['loadJs']);
        if (is_array($js)) {
            foreach ($js as $item) {
                $this->data['loadJs'][$index] = $item;
                $index++;
            }
        } else {
            $this->data['loadJs'][$index] = $js;
        }
    }

    public function generateJs()
    {
        if(isset($this->data['loadJs'])){
            foreach ($this->data['loadJs'] as $js) {
                echo "<script src=\"".site_url($js).".js\"></script>".PHP_EOL;
            }
        }
    }
}

