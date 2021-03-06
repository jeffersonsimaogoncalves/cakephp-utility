<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 18:25
 */

namespace JeffersonSimaoGoncalves\Utility\Lib;

use HtmlGenerator\HtmlTag;

/**
 * Trait HtmlTrait
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utility\Lib
 */
trait HtmlTrait
{
    /**
     * @param array  $params
     * @param string $content
     *
     * @return string
     */
    protected function a(array $params, string $content)
    {
        $a = HtmlTag::createElement('a');
        $a->set($this->formatAttributes($params));
        $a->text($content);

        return $a->toString();
    }

    /**
     * @param array $options
     * @param array $exclude
     *
     * @return array
     */
    protected function formatAttributes(array $options, array $exclude = [])
    {
        $options = (array)$options + ['escape' => true];

        if (!is_array($exclude)) {
            $exclude = [];
        }

        $exclude = ['escape' => true, 'idPrefix' => true, 'templateVars' => true] + array_flip($exclude);
        $escape = $options['escape'];
        $attributes = [];

        foreach ($options as $key => $value) {
            if (!isset($exclude[$key]) && $value !== false && $value !== null) {
                $attributes[$key] = $this->_formatAttribute($key, $value, $escape);
            }
        }

        return $attributes;
    }

    /**
     * @param      $key
     * @param      $value
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
            $key = h($key);
        }
        if ($isMinimized && in_array($value, $truthy, true)) {
            return "$key=\"$key\"";
        }
        if ($isMinimized) {
            return '';
        }

        return ($escape ? h($value) : $value);
    }


    /**
     * @param array $params
     *
     * @return string
     */
    protected function i(array $params)
    {
        $i = HtmlTag::createElement('i');
        $i->set($this->formatAttributes($params));

        return $i->toString();
    }

    /**
     * @param array $params
     *
     * @return string
     */
    protected function input(array $params)
    {
        $input = HtmlTag::createElement('input');
        $input->set($this->formatAttributes($params));

        return $input->toString();
    }

    /**
     * @param array  $params
     * @param string $content
     *
     * @return string
     */
    protected function div(array $params, string $content)
    {
        $div = HtmlTag::createElement('div');
        $div->set($this->formatAttributes($params));
        $div->text($content);

        return $div->toString();
    }

    /**
     * @param array  $params
     * @param string $content
     *
     * @return string
     */
    protected function form(array $params, string $content)
    {
        $form = HtmlTag::createElement('form');
        $form->set($this->formatAttributes($params));
        $form->text($content);

        return $form->toString();
    }
}
