<?php

// Adv Accordion
// =============================================================================

function csl_shortcode_layerslider( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => ''
  ), $atts, 'csl_layerslider' ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class = ( $class != '' ) ? 'class="csl-layerslider ' . esc_attr( $class ) . '"' : 'csl-layerslider';
  $style = ( $style != '' ) ? 'style="' . $style . '"' : '';

  $output = "<div {$id} {$class} {$style}>" . do_shortcode( $content ) . "</div>";

  return $output;
}

add_shortcode( 'csl_layerslider', 'csl_shortcode_layerslider' );



// Adv Accordion Item
// =============================================================================

function csl_shortcode_layerslider_item( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'style'     => '',
    'parent_id' => '',
    'title'     => '',
  ), $atts, 'csl_layerslider_item' ) );

  $id        = ( $id        != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class     = ( $class     != ''     ) ? 'class="csl-layerslider-item ' . esc_attr( $class ) : 'csl-layerslider-item';
  $style     = ( $style     != ''     ) ? 'style="' . $style . '"' : '';
  $parent_id = ( $parent_id != ''     ) ? 'data-parent="#' . $parent_id . '"' : '';
  $title     = ( $title     != ''     ) ? $title : 'Make Sure to Set a Title';
  $open      = ( $open      == 'true' ) ? 'collapse in' : 'collapse';

  static $count = 0; $count++;

  if ( $open == 'collapse in' ) {

    $output = "<div {$id} {$class} {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  } else {

    $output = "<div {$id} class=\"{$class}\" {$style}>"
              . '<div class="x-accordion-heading">'
                . "<a class=\"x-accordion-toggle collapsed\" {$color} data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\"><span class=\"adv-title\">{$title}</span> <span class=\"extra-title\">{$title_extra}</span></a>"
              . '</div>'
              . "<div id=\"collapse-{$count}\" class=\"accordion-body {$open}\">"
                . '<div class="x-accordion-inner">'
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>';

  }

  return $output;
}

add_shortcode( 'csl_layerslider_item', 'csl_shortcode_layerslider_item' );