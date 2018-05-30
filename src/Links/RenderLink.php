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
 * @property bool   blank
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
     */
    public function linkView(string $link, string $title = '')
    {
        $this->typeLink = TypeLink::VIEW;
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
     */
    public function linkEdit(string $link)
    {
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = 'btn-primary';
        $this->classIcon = 'glyphicon-pencil';
    }

    /**
     * @param string $link
     */
    public function linkPdf(string $link)
    {
        $this->typeLink = TypeLink::FILE_PDF;
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
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = 'btn-success';
        $this->classIcon = 'fa-check-circle';
    }
}
