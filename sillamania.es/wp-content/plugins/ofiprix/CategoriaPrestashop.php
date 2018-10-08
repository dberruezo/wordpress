<?php
/**
 * Class CategoryCore
 */

class CategoriaPrestashop{
    
    public $id;

    /** @var int category ID */
    public $id_category;

    /** @var mixed string or array of Name */
    public $name;

    /** @var bool Status for display */
    public $active = 1;

    /** @var  int category position */
    public $position;

    /** @var mixed string or array of Description */
    public $description;

    /** @var int Parent category ID */
    public $id_parent;

    /** @var int default Category id */
    public $id_category_default;

    /** @var int Parents number */
    public $level_depth;

    /** @var int Nested tree model "left" value */
    public $nleft;

    /** @var int Nested tree model "right" value */
    public $nright;

    /** @var mixed string or array of string used in rewrited URL */
    public $link_rewrite;

    /** @var mixed string or array of Meta title */
    public $meta_title;

    /** @var mixed string or array of Meta keywords */
    public $meta_keywords;

    /** @var mixed string or array of Meta description */
    public $meta_description;

    /** @var string Object creation date */
    public $date_add;

    /** @var string Object last modification date */
    public $date_upd;

    /** @var bool is Category Root */
    public $is_root_category;

    /** @var int */
    public $id_shop_default;

    public $groupBox;

    /** @var bool */
    public $doNotRegenerateNTree = false;

    protected static $_links = array();

    public function __construct(){

    }
    
}
?>