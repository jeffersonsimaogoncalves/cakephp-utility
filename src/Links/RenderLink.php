<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:31
 */

namespace JeffersonSimaoGoncalves\Utils\Links;

use JeffersonSimaoGoncalves\Utils\TypeLink;

/**
 * Class RenderLink
 *
 * @property string title
 * @property string typeLink
 * @property bool blank
 * @property bool modalView
 * @property string modalViewTarget
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Links
 */
class RenderLink extends RenderBase
{
    /**
     * RenderLink constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->blank = false;
        $this->title = '';
    }

    /**
     * @param string $link
     * @param string $title
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkView(string $link, string $title = '', bool $modalView = false, string $modalViewTarget = '')
    {
        $this->typeLink = TypeLink::VIEW;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-default';
        $this->classIcon = 'glyphicon-eye-open';
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     * @param string $title
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkImage(string $link, string $title = '', bool $modalView = false, string $modalViewTarget = '')
    {
        $this->typeLink = TypeLink::FILE_IMAGE;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-success imageview';
        $this->classIcon = 'fa-picture-o';
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkAdd(string $link, string $title = '')
    {
        $this->typeLink = TypeLink::VIEW;
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
        $this->typeLink = TypeLink::LINK;
        $this->link = $link;
        $this->title = $title;
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkBack(string $link, string $title = '')
    {
        $this->typeLink = TypeLink::BACK;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = 'btn-default';
        $this->classIcon = 'glyphicon-list';
    }

    /**
     * @param string $link
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkEdit(string $link, bool $modalView = false, string $modalViewTarget = '')
    {
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = 'btn-primary';
        $this->classIcon = 'glyphicon-pencil';
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkPdf(string $link, bool $modalView = false, string $modalViewTarget = '')
    {
        $this->typeLink = TypeLink::FILE_PDF;
        $this->link = $link;
        $this->blank = true;
        $this->classLink = 'btn-success';
        $this->classIcon = 'fa-file-pdf-o';
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     */
    public function linkAccept(string $link)
    {
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = 'btn-success';
        $this->classIcon = 'fa-check-circle';
    }
}
