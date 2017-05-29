<?php

/**
 * return instance ci
 *
 * @access public
 *
 * @return object
 */
if ( ! function_exists('_ci'))
{
    function _ci()
    {
        $CI =& get_instance();
        return $CI;
    }
}

/**
 * debug and die
 * dd - usado para debugar a aplicação durante o desenvolvimento
 */
if ( ! function_exists('dd'))
{
    function dd($content, $die = TRUE, $print = 'var_dump') {
        echo "<pre>";
        $print($content);
        echo "</pre>";

        if ($die == TRUE) {
            die();
        }
    }
}



/**
 * linkBtnModalDT
 *
 * cria um link como botão de modal para DataTables
 *
 * @access  public
 * @param   int
 * @return  string
 */
if ( ! function_exists('linkBtnModalDT'))
{
    function linkBtnModalDT($valor, $href = '', $data = '' , $dataTarget = 'edit', $classLink = 'edit_row_dt', $icon = 'glyphicon-tags', $isBtn = TRUE, $responsive = TRUE)
    {
        $class = "";
        if ($isBtn)
        {
            $class .= "btn btn-xs ";
            $class .= getClassBtnValor($valor);
        }

        $class.= $classLink;

        $attrData = "";
        if($data !== FALSE)
            $attrData = 'data-id="' . $data .'" data-toggle="modal"';

        $html = '<a data-target="#' . $dataTarget . '" ' . $attrData . ' class="' . $class .'" href="'. $href .'" title="' . $valor . '">';

        if($icon !== FALSE)
            $html.= '<span class="glyphicon '. $icon .'"></span>';

        if($responsive)
        {
            $html .= $isBtn ? nbs(2) . $valor : '<span class="visible-xs">' . nbs(1) . $valor . '</span>';
        }


        $html.= '</a>';


        return $html;
    }
}




/**
 * getClassBtnValor
 *
 * retorna a classe para o botao conforme valor passado
 *
 * @access  public
 * @param   int
 * @return  string
 */
if ( ! function_exists('getClassBtnValor'))
{
    function getClassBtnValor($valor)
    {
        return $valor > 0 ? " btn-primary " : " btn-danger ";
    }
}