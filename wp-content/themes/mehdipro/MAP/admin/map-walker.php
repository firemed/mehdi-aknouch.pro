<?php
class Map_Walker extends Walker_Nav_Menu {
//    function start_lvl( &$output, $depth, $args ) {
//        // $output correspond à la variable retournée en fin de walker
//        // $depth correspond à la profondeur du niveau
//        // $arg aux variable supplémentaires
//    }
//    function start_el( &$output, $item, $depth, $args ) {
//        // $output correspond à la variable retournée en fin de walker
//        // $item correspond aux information sur l'item en cours
//        // $depth correspond à la profondeur du niveau
//        // $arg aux variable supplémentaires
//    }
//    function end_el( &$output, $item, $depth, $args ) {
//        // $output correspond à la variable retournée en fin de walker
//        // $item correspond aux information sur l'item en cours
//        // $depth correspond à la profondeur du niveau
//        // $arg aux variable supplémentaires
//    }
//    function end_lvl( &$output, $depth, $args ) {
//        // $output correspond à la variable retournée en fin de walker
//        // $depth correspond à la profondeur du niveau
//        // $arg aux variable supplémentaires
//    }
    /**
     * At the start of each element, output a <li> and <a> tag structure.
     *
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $output .= "<li class='menu-item'>";
        $is_current = $item->object_id === get_the_ID() ; // Get better way of testing current
        $link = preg_replace( '|http?://[^/]+(/.*)|i', '$1', $item->url );
        $linkAr = explode('/',$item->url);
//        print_r($linkAr);exit();
        $linkCl = $linkAr[3];
//        print_r($linkCl);
        $output .= "<a href='$linkCl' class='menu-link ".( $is_current ? 'active' : '')."'> $item->title </a> ";
        $output .= "</li> ";

//        $output .= sprintf( "\n<li><a href='%s'%s>%s</a></li>\n",
//            $item->url,
//            ( $item->object_id === get_the_ID() ) ? ' class="current "' : '',
//            $item->title
//        );
    }
}