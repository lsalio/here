<?php
/**
 * FileStreamBase.php
 *
 * @package   Here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2017 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Lib\Stream;
use Lib\Stream\DuplexStream\DuplexStreamInterface;
use Lib\Stream\IStream\ReaderStreamInterface;
use Lib\Stream\OStream\WriterStreamInterface;


/**
 * Class FileStreamBase
 * @package Lib\Stream
 */
abstract class FileStreamBase implements FileStreamInterface {
    /**
     * @var resource
     */
    protected $_file_handler;

    /**
     * @param string $file_path
     * @throws FileStreamInvalid
     */
    final public function open(string $file_path): void {
        // check file exists
        if (!is_file($file_path)) {
            throw new FileStreamInvalid("cannot open `{$file_path}`");
        }

        // check has file opened
        if (is_resource($this->_file_handler)) {
            $this->close();
        }

        // open file
        $this->_file_handler = fopen($file_path, $this->_resolve_open_mode());
    }

    /**
     * @inheritdoc
     */
    final public function close(): void {
        fclose($this->_file_handler);
        $this->_file_handler = null;
    }

    /**
     * @inheritdoc
     */
    final public function reset(): void {
        fseek($this->_file_handler, 0);
    }

    /**
     * @return string
     */
    final private function _resolve_open_mode(): string {
        $mode = '';
        switch (true) {
            case ($this instanceof ReaderStreamInterface):
                $mode = 'r'; break;
            case ($this instanceof WriterStreamInterface):
                $mode = 'w'; break;
            case ($this instanceof DuplexStreamInterface):
                $mode = 'a'; break;
        }
        return $mode;
    }
}