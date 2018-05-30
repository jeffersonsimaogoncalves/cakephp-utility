<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 18:25
 */

namespace JeffersonSimaoGoncalves\Utils\Lib;

use HtmlGenerator\HtmlTag;

/**
 * Trait HtmlTrait
 *
 * @package JeffersonSimaoGoncalves\Utils\Lib
 */
trait HtmlTrait
{
    /**
     * @param array $params
     * @param $content
     *
     * @return string
     */
    protected function a(array $params, $content)
    {
        return HtmlTag::createElement('a')->set($params)->text($content);
    }

    /**
     * @param $params
     *
     * @return string
     */
    protected function i($params)
    {
        return HtmlTag::createElement('i')->set($params);
    }

    /**
     * @param array $options
     * @param array $exclude
     *
     * @return string
     */
    protected function formatAttributes(array $options, array $exclude = [])
    {
        $insertBefore = ' ';
        $options = (array)$options + ['escape' => true];

        if (!is_array($exclude)) {
            $exclude = [];
        }

        $exclude = ['escape' => true, 'idPrefix' => true, 'templateVars' => true] + array_flip($exclude);
        $escape = $options['escape'];
        $attributes = [];

        foreach ($options as $key => $value) {
            if (!isset($exclude[$key]) && $value !== false && $value !== null) {
                $attributes[] = $this->_formatAttribute($key, $value, $escape);
            }
        }
        $out = trim(implode(' ', $attributes));

        return $out ? $insertBefore . $out : '';
    }

    /**
     * @param $key
     * @param $value
     * @param bool $escape
     *
     * @return string
     */
    protected function _formatAttribute($key, $value, $escape = true)
    {
        if (is_array($value)) {
            $value = implode(' ', $value);
        }
        if (is_numeric($key)) {
            return "$value=\"$value\"";
        }
        $truthy = [1, '1', true, 'true', $key];
        $isMinimized = isset($this->_compactAttributes[$key]);
        if (!preg_match('/\A(\w|[.-])+\z/', $key)) {
            $key = $this->h($key);
        }
        if ($isMinimized && in_array($value, $truthy, true)) {
            return "$key=\"$key\"";
        }
        if ($isMinimized) {
            return '';
        }

        return $key . '="' . ($escape ? $this->h($value) : $value) . '"';
    }

    /**
     * @param $text
     * @param bool $double
     * @param null $charset
     *
     * @return array|string
     */
    protected function h($text, $double = true, $charset = null)
    {
        if (is_string($text)) {
            //optimize for strings
        } elseif (is_array($text)) {
            $texts = [];
            foreach ($text as $k => $t) {
                $texts[$k] = $this->h($t, $double, $charset);
            }

            return $texts;
        } elseif (is_object($text)) {
            if (method_exists($text, '__toString')) {
                $text = (string)$text;
            } else {
                $text = '(object)' . get_class($text);
            }
        } elseif ($text === null || is_scalar($text)) {
            return $text;
        }

        static $defaultCharset = false;
        if ($defaultCharset === false) {
            $defaultCharset = mb_internal_encoding();
            if ($defaultCharset === null) {
                $defaultCharset = 'UTF-8';
            }
        }
        if (is_string($double)) {
            deprecationWarning(
                'Passing charset string for 2nd argument is deprecated. ' .
                'Use the 3rd argument instead.'
            );
            $charset = $double;
        }

        return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, $charset ?: $defaultCharset, $double);
    }
}
