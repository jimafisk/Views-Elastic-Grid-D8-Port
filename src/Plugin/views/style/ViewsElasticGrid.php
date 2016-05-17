<?php

namespace Drupal\views_elastic_grid\Plugin\views\style;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render each item in a grid cell.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_elastic_grid",
 *   title = @Translation("Views Elastic Grid"),
 *   help = @Translation("Display the results as a grid that expands to reveal additional info."),
 *   theme = "views_elastic_grid_list",
 *   display_types = {"normal"}
 * )
 */
class ViewsElasticGrid extends StylePluginBase {
  /**
    * {@inheritdoc}
    */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['views_elastic_grid']['thumbnail_fields'] = array('default' => array());
    $options['views_elastic_grid']['expanded_fields'] = array('default' => array());
    $options['type'] = array('default' => 'ul');
    $options['class'] = array('default' => '');
    $options['wrapper_class'] = array('default' => 'item-list');

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $field_names = $this->displayHandler->getFieldLabels(TRUE);
    $form['views_elastic_grid'] = array(
      '#title' => t('Elastic Grid Settings'),
      '#type' => 'fieldset',
    );
    $form['views_elastic_grid']['thumbnail_fields'] = array(
      '#title' => t('Thumbnail Fields'),
      '#description' => t('The fields that should be displayed as part of the thumbnail.'),
      '#type' => 'checkboxes',
      '#default_value' => $this->options['views_elastic_grid']['thumbnail_fields'],
      '#options' => $field_names,
    );
    $form['views_elastic_grid']['expanded_fields'] = array(
      '#title' => t('Expanded Area Fields'),
      '#description' => t('The fields that should be displayed as part of the expanded area.'),
      '#type' => 'checkboxes',
      '#default_value' => $this->options['views_elastic_grid']['expanded_fields'],
      '#options' => $field_names,
    );
    $form['views_elastic_grid']['id_field'] = array(
      '#title' => t('ID Field for URL Fragments'),
      '#description' => t('A unique ID field (Node ID, etc.) so that links to specific items open those items on page load.'),
      '#type' => 'select',
      '#default_value' => $this->options['views_elastic_grid']['id_field'],
      '#options' => array_merge(array('' => 'View Row Number'), $field_names),
    );
    $form['wrapper_class'] = array(
      '#title' => t('Wrapper class'),
      '#description' => t('The class to provide on the wrapper, outside the list.'),
      '#type' => 'textfield',
    );
  }
}
