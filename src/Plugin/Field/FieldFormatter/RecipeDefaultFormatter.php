<?php

namespace Drupal\recipe\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;

/**
 * Plugin implementation of the 'ReicpeDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "RecipeDefaultFormatter",
 *   label = @Translation("Recipe"),
 *   field_types = {
 *     "Recipe"
 *   }
 * )
 */
class RecipeDefaultFormatter extends FormatterBase {

  /**
   * Define how the field type is showed.
   * 
   * Inside this method we can customize how the field is displayed inside 
   * pages.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->quantity . '  ' . $item->measurement . '  ' . $item->description
      ];
    }

    return $elements;
  }
  
} // class