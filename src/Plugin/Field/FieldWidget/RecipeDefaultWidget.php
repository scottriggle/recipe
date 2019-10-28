<?php

namespace Drupal\recipe\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'RecipeDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "RecipeDefaultWidget",
 *   label = @Translation("Recipe select"),
 *   field_types = {
 *     "Recipe"
 *   }
 * )
 */
class RecipeDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   * 
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Quantity

    $element['quantity'] = [
      '#type' => 'textfield',
      '#title' => t('Quantity'),

      // Set here the current value for this field, or a default value (or 
      // null) if there is no a value
      '#default_value' => isset($items[$delta]->quantity) ? 
          $items[$delta]->quantity : null,

      '#empty_value' => '',
      '#placeholder' => t('Quantity'),
    ];

    // Measurement
    $element['measurement'] = [
      '#type' => 'textfield',
      '#title' => t('Measurement'),
      '#default_value' => isset($items[$delta]->measurement) ? 
          $items[$delta]->measurement : null,
      '#empty_value' => '',
      '#placeholder' => t('Measurement'),
    ];

    // Description
    $element['description'] = [
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#default_value' => isset($items[$delta]->description) ? 
          $items[$delta]->description : null,
      '#empty_value' => '',
      '#placeholder' => t('Description'),
    ];
      
    return $element;
  }

} // class