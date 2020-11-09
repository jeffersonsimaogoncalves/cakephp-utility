<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:37
 */

namespace JeffersonSimaoGoncalves\Utility\Links;

/**
 * Class RenderBase
 *
 * @property string link
 * @property string classLink
 * @property string classIcon
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utility\Links
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
    public function getClassLink()
    : string
    {
        return $this->classLink;
    }

    /**
     * @return string
     */
    public function getClassIcon()
    : string
    {
        return $this->classIcon;
    }
}
