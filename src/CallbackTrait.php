<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 23/05/2018
 * Time: 23:33
 */

namespace JeffersonSimaoGoncalves\Utils;

use JeffersonSimaoGoncalves\Utils\Lib\CallbackFunction;

/**
 * Trait CallbackTrait
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils
 */
trait CallbackTrait
{
    /**
     * Return a Javascript function wrapper to be used in DataTables configuration
     *
     * @param string $name Name of Javascript function to call
     * @param array  $args Optional array of arguments to be passed when calling
     *
     * @return \JeffersonSimaoGoncalves\Utils\Lib\CallbackFunction
     */
    public function callback(string $name, array $args = []): CallbackFunction
    {
        return new CallbackFunction($name, $args);
    }
}
