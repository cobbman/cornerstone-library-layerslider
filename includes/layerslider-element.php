<?php
/**
 *
 * To discover more fields you can use, see examples from current Cornerstone elements! Here's where you'll find them:
 * In the Cornerstone plugin, look in /includes/modules/elements/ and /includes/modules/shortcodes
 *
 * You can find the function reference and inline documentation in this file (of the Cornerstone Plugin):
 *   -------------------------------------------
 *  |   /cornerstone/includes/utility/api.php   |
 *   -------------------------------------------
 *
 * For more documentation, please see: https://theme.co/community/kb/cornerstone-custom-elements/
 *
 **/
?>

<?php

class CSL_LayerSlider extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'csl-layerslider',
      'title'       => __( 'Layerslider', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Layerslider description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
      // 'childType'   => 'csl-layerslider-item',
      // 'renderChild' => true
    );
  }

  public function controls() {

    $sliders = array();

    if ( class_exists( 'LS_Sliders' ) ) {
      $ls_sliders  = LS_Sliders::find();

      foreach ( $ls_sliders as $slider ) {
        $sliders[] = array( 'value' => $slider['id'], 'label' => $slider['name'] );
      }
    }

    if ( empty( $sliders ) ) {
      $sliders[] = array( 'value' => 'none', 'label' => __( 'No slider available', csl18n() ), 'disabled' => true );
    }

    $this->addControl(
      'slide_id',
      'select',
      __( 'Select Slider', csl18n() ),
      __( 'Choose from sliders that have already been created in the Layerslider admin area.', csl18n() ),
      $sliders[0]['value'],
      array(
        'choices' => $sliders
      )
    );
  }

  public function isActive() {
    return class_exists( 'LS_Sliders' );
  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[layerslider id=\"$slide_id\"]";

    return $shortcode;

  }

}