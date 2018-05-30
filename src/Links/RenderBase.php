<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:37
 */

namespace JeffersonSimaoGoncalves\Utils\Links;

/**
 * Class RenderBase
 *
 * @property string link
 * @property string classLink
 * @property string classIcon
 *
 * @package JeffersonSimaoGoncalves\Utils\Links
 */
abstract class RenderBase
{
    /**
     * RenderBase constructor.
     */
    public function __construct()
    {
        $this->link = '';
        $this->classIcon = '';
        $this->classLink = '';
    }

    /**
     * @return string
     */
    public function getPrefixClassLink(): string
    {
        return explode('-', $this->classLink)[0];
    }

    /**
     * @return string
     */
    public function getPrefixClassIcon(): string
    {
        return explode('-', $this->classIcon)[0];
    }
}
