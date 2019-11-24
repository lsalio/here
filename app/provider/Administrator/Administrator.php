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
namespace Here\Provider\Administrator;

use Here\Model\Author as AuthorModel;
use Here\Model\Middleware\Author;


/**
 * Class Administrator
 * @package Here\Provider\Administrator
 */
final class Administrator {

    /**
     * @var AuthorModel
     */
    private $author;

    /**
     * Initializing the administrator from cache and database
     */
    public function __construct() {
        $this->author = Author::findFist();
    }

    /**
     * Returns true when author exists, false otherwise
     *
     * @return bool
     */
    public function exists(): bool {
        return $this->author !== null;
    }

}