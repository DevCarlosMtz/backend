<?php

namespace App\Traits;

use App\Helpers\ClassHelper;

/**
 * Trait for Log
 *
 * @author Ing. Benjamín Olvera Rosales
 */
trait Log
{
    /**
     * Get the name of the class
     *
     * @return string
     */
    protected function getClassName(int $indexClassPosition = 1)
    {
        $class = 'unknownClass';
        if (!empty(debug_backtrace())) {
            if (!empty(debug_backtrace()[$indexClassPosition])) {
                if (!empty(debug_backtrace()[$indexClassPosition]['class'])) {
                    $class = ClassHelper::getName(debug_backtrace()[$indexClassPosition]['class']);
                }
            }
        }

        return $class;
    }

    /**
     * Get the name of the method
     *
     * @return string
     */
    protected function getMethodName(int $indexMethodPosition = 1)
    {
        $function = 'unknownMethod';
        if (!empty(debug_backtrace())) {
            if (!empty(debug_backtrace()[$indexMethodPosition])) {
                if (!empty(debug_backtrace()[$indexMethodPosition]['function'])) {
                    $function = debug_backtrace()[$indexMethodPosition]['function'];
                }
            }
        }

        return $function;
    }

    /**
     * Get the arguments used in the method
     *
     * @return array|null
     */
    protected function getMethodArgs(int $indexMethodPosition = 1)
    {
        $args = null;
        if (!empty(debug_backtrace())) {
            if (!empty(debug_backtrace()[$indexMethodPosition])) {
                if (!empty(debug_backtrace()[$indexMethodPosition]['args'])) {
                    $args = (array) debug_backtrace()[$indexMethodPosition]['args'];
                }
            }
        }

        return $args;
    }

    /**
     * Get the class name and method name
     *
     * @return string
     */
    protected function getClassNameAndMethod(int $indexClassAndMethodPosition = 2)
    {
        return $this->getClassName($indexClassAndMethodPosition) . '::' . $this->getMethodName($indexClassAndMethodPosition) . '()';
    }

    /**
     * Make a debug log for init method
     *
     * @return void
     */
    protected function logInitMethod()
    {
        debug_(
            "Inicia {$this->getClassNameAndMethod(3)}",
            [
                'arguments' => $this->getMethodArgs(2),
            ]
        );
    }

    /**
     * Make a debug log for end method
     *
     * @return void
     */
    protected function logEndMethod()
    {
        debug_("Finaliza {$this->getClassNameAndMethod(3)}");
    }
}
