<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Simão Gonçalves
 * Email: gerson.simao.92@gmail.com
 * GitHub: https://github.com/jeffersonsimaogoncalves
 * Date: 09/06/2018
 * Time: 12:42
 */

namespace JeffersonSimaoGoncalves\Utils\Lib;

/**
 * Trait RouteTrait
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Lib
 */
trait RouteTrait
{
    /**
     * @param array|string $defaults
     *
     * @return array|string
     */
    protected function parseDefaults($defaults)
    {
        if (!is_string($defaults)) {
            return $defaults;
        }

        $regex = '/(?:(?<plugin>[a-zA-Z0-9\/]*)\.)?(?<prefix>[a-zA-Z0-9\/]*?)' .
            '(?:\/)?(?<controller>[a-zA-Z0-9]*):{2}(?<action>[a-zA-Z0-9_]*)/i';

        if (preg_match($regex, $defaults, $matches)) {
            foreach ($matches as $key => $value) {
                // Remove numeric keys and empty values.
                if (is_int($key) || $value === '' || $value === '::') {
                    unset($matches[$key]);
                }
            }
            $length = count($matches);

            if (isset($matches['prefix'])) {
                $matches['prefix'] = strtolower($matches['prefix']);
            }

            if ($length >= 2 || $length <= 4) {
                return $matches;
            }
        }

        return $defaults;
    }
}