<?php
/**
 * here application
 *
 * @package   here
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2016-2019 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/nosjay/here
 */
namespace Here\Model;

use Here\Library\Mvc\Model\AbstractModel;


/**
 * Class Category
 * @package Here\Model
 */
final class Category extends AbstractModel {

    /**
     *
     * @var integer
     */
    protected $category_id;

    /**
     *
     * @var string
     */
    protected $category_name;

    /**
     *
     * @var string
     */
    protected $category_introduction;

    /**
     *
     * @var integer
     */
    protected $category_parent;

    /**
     *
     * @var string
     */
    protected $create_time;

    /**
     * Method to set the value of field category_name
     *
     * @param string $category_name
     * @return $this
     */
    final public function setCategoryName(string $category_name) {
        $this->category_name = $category_name;
        return $this;
    }

    /**
     * Method to set the value of field category_introduction
     *
     * @param string $category_introduction
     * @return $this
     */
    final public function setCategoryIntroduction(string $category_introduction) {
        $this->category_introduction = $category_introduction;
        return $this;
    }

    /**
     * Method to set the value of field category_parent
     *
     * @param integer $category_parent
     * @return $this
     */
    final public function setCategoryParent(int $category_parent) {
        $this->category_parent = $category_parent;
        return $this;
    }

    /**
     * Returns the value of field category_id
     *
     * @return integer
     */
    final public function getCategoryId(): int {
        return (int)$this->category_id;
    }

    /**
     * Returns the value of field category_name
     *
     * @return string
     */
    final public function getCategoryName(): ?string {
        return $this->category_name;
    }

    /**
     * Returns the value of field category_introduction
     *
     * @return string
     */
    final public function getCategoryIntroduction(): ?string {
        return $this->category_introduction;
    }

    /**
     * Returns the value of field category_parent
     *
     * @return integer
     */
    final public function getCategoryParent(): int {
        return (int)$this->category_parent;
    }

    /**
     * Returns the value of field create_time
     *
     * @return string
     */
    final public function getCreateTime(): ?string {
        return $this->create_time;
    }

    /**
     * Initialize method for model.
     */
    final public function initialize() {
        $this->setSource('category');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    final public function getSource() {
        return 'category';
    }

}