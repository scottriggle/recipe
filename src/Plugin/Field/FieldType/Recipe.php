<?php

namespace Drupal\recipe\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'recipe' field type.
 *
 * @FieldType(
 *   id = "Recipe",
 *   label = @Translation("Recipes"),
 *   description = @Translation("Stores a recipe."),
 *   category = @Translation("Custom"),
 *   default_widget = "RecipeDefaultWidget",
 *   default_formatter = "RecipeDefaultFormatter"
 * )
 */
class Recipe extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['quantity'] = DataDefinition::create('string')
      ->setLabel(t('Quantity'));

    $properties['measurement'] = DataDefinition::create('string')
      ->setLabel(t('Measurement'));
      
    $properties['description'] = DataDefinition::create('string')
      ->setLabel(t('Description'));

    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   * 
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['quantity'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['measurement'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['description'] = [
      'type' => 'char',
      'length' => 255,
    ];
    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   * 
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {

    $isEmpty = 
      empty($this->get('quantity')->getValue()) &&
      empty($this->get('measurement')->getValue()) &&
      empty($this->get('description')->getValue());

    return $isEmpty;
  }

} // class