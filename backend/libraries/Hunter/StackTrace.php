<?php
/**
 * StackTrace.php
 *
 * @package   here
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2016-2018 Jayson Wang
 * @license   MIT License
 */
namespace Here\Libraries\Hunter;


/**
 * Class StackTrace
 * @package Here\Libraries\Hunter
 */
final class StackTrace implements \IteratorAggregate {

    /**
     * @var array
     */
    private $trace_stack;

    /**
     * StackTrace constructor.
     */
    final public function __construct() {
        $this->analysis_stack_trace(debug_backtrace());
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator($this->trace_stack);
    }

    /**
     * @param array $stack_trace
     */
    final private function analysis_stack_trace(array $stack_trace): void {
        foreach ($stack_trace as $index => $call_info) {
            $this->trace_stack[] = array(
                self::STACK_TRACE_CALLED_INDEX  => $index,
                self::STACK_TRACE_CALLED_AT     => $call_info['file'] ?? 'UNKNOWN',
                self::STACK_TRACE_CALLED_LINE   => $call_info['line'] ?? 'UNKNOWN',
                self::STACK_TRACE_CLASS_NAME    => $call_info['class'] ?? '',
                self::STACK_TRACE_FUNCTION_NAME => $call_info['function'] ?? 'UNKNOWN',
                self::STACK_TRACE_CALL_OPERATOR => $call_info['type'] ?? '::',
                self::STACK_TRACE_ARGUMENTS     => $call_info['args'] ?? 'UNKNOWN'
            );
        }
    }

    /**
     * called item index
     */
    public const STACK_TRACE_CALLED_INDEX = 'top';

    /**
     * called at where
     */
    public const STACK_TRACE_CALLED_AT = 'called_at';

    /**
     * called at line number
     */
    public const STACK_TRACE_CALLED_LINE = 'called_line';

    /**
     * class name
     */
    public const STACK_TRACE_CLASS_NAME = 'class_name';

    /**
     * function name
     */
    public const STACK_TRACE_FUNCTION_NAME = 'function_name';

    /**
     * call operator
     */
    public const STACK_TRACE_CALL_OPERATOR = 'call_operator';

    /**
     * call arguments
     */
    public const STACK_TRACE_ARGUMENTS = 'arguments';

}