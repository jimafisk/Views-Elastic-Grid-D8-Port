<?php

/**
 * @file
 * Contains \Drupal\views_elastic_grid\Controller\ViewsElasticGridController.
 */

namespace Drupal\views_elastic_grid\Controller;

use Drupal\Core\Controller\ControllerBase;

class ViewsElasticGridController extends ControllerBase {
  public function content() {

    return array(
      '#theme' => 'views_elastic_grid_list',
      //'#test_var' => $this->t('Test Value'),
      '#view' => NULL,
    );

  }
}
