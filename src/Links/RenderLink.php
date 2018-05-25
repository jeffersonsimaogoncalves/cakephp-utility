<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:31
 */

namespace JeffersonSimaoGoncalves\Utils\Links;

/**
 * Class RenderLink
 *
 * @property string link
 * @property string classLink
 * @property string classIcon
 * @property string title
 * @property string typeLink
 * @property bool blank
 *
 * @package JeffersonSimaoGoncalves\Utils\Links
 */
class RenderLink
{
    /**
     * RenderLink constructor.
     */
    public function __construct()
    {
        $this->blank = false;
        $this->title = '';
    }

    /**
     * @return string
     */
    public function getPrefixClassLink(): string
    {
        return isset($this->classLink) ? explode('-', $this->classLink)[0] : '';
    }

    /**
     * @return string
     */
    public function getPrefixClassIcon(): string
    {
        return isset($this->classIcon) ? explode('-', $this->classIcon)[0] : '';
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkView(string $link, string $title = '')
    {
        $this->typeLink = 'View';
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-default';
        $this->classIcon = 'glyphicon-eye-open';
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkAdd(string $link, string $title = '')
    {
        $this->typeLink = 'View';
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-success';
        $this->classIcon = 'glyphicon-plus';
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function link(string $link, string $title = '')
    {
        $this->typeLink = 'link';
        $this->link = $link;
        $this->title = $title;
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkBack(string $link, string $title = '')
    {
        $this->typeLink = 'back';
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-default';
        $this->classIcon = 'glyphicon-list';
    }

    /**
     * @param string $link
     */
    public function linkEdit(string $link)
    {
        $this->typeLink = 'edit';
        $this->link = $link;
        $this->classLink = 'btn-primary';
        $this->classIcon = 'glyphicon-pencil';
    }

    /**
     * @param string $link
     */
    public function linkPdf(string $link)
    {
        $this->typeLink = 'pdf';
        $this->link = $link;
        $this->blank = true;
        $this->classLink = 'btn-success';
        $this->classIcon = 'fa-file-pdf-o';
    }

    /**
     * @param string $link
     */
    public function linkAccept(string $link)
    {
        $this->typeLink = 'edit';
        $this->link = $link;
        $this->classLink = 'btn-success';
        $this->classIcon = 'fa-check-circle';
    }
}
