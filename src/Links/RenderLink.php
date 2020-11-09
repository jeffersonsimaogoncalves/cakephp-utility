<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:31
 */

namespace JeffersonSimaoGoncalves\Utility\Links;

use Cake\Core\Configure;
use JeffersonSimaoGoncalves\Utility\TypeLink;

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
 * @package JeffersonSimaoGoncalves\Utility\Links
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
        $this->modalView = false;
        $this->modalViewTarget = '';
    }

    /**
     * @param string $link
     * @param string $title
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkView(string $link, string $title = '', bool $modalView = false, string $modalViewTarget = '')
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkView');
        $this->typeLink = TypeLink::VIEW;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
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
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkImage');
        $this->typeLink = TypeLink::FILE_IMAGE;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     * @param string $title
     */
    public function linkAdd(string $link, string $title = '')
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkAdd');
        $this->typeLink = TypeLink::VIEW;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
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
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkBack');
        $this->typeLink = TypeLink::BACK;
        $this->link = $link;
        $this->title = $title;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
    }

    /**
     * @param string $link
     * @param bool $modalView
     * @param string $modalViewTarget
     */
    public function linkEdit(string $link, bool $modalView = false, string $modalViewTarget = '')
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkEdit');
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
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
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkPdf');
        $this->typeLink = TypeLink::FILE_PDF;
        $this->link = $link;
        $this->blank = true;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
        $this->modalView = $modalView;
        $this->modalViewTarget = $modalViewTarget;
    }

    /**
     * @param string $link
     */
    public function linkAccept(string $link)
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utility.RenderLink.linkAccept');
        $this->typeLink = TypeLink::EDIT;
        $this->link = $link;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
    }
}
