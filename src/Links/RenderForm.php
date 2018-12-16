<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:36
 */

namespace JeffersonSimaoGoncalves\Utils\Links;

use Cake\Core\Configure;
use Cake\Utility\Text;

/**
 * Class RenderForm
 *
 * @property bool confirmBox
 * @property string confirmText
 * @property string action
 * @property string id
 * @property string title
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Links
 */
class RenderForm extends RenderBase
{
    /**
     * RenderForm constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->confirmBox = false;
        $this->confirmText = '';
        $this->title = '';
    }

    /**
     * @param string $link
     * @param bool $status
     */
    public function formStatus(string $link, bool $status)
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utils.RenderForm.formStatus');
        $value = ($status) ? 'activate' : 'inactivate';
        $this->link = $link;
        $this->action = $dados[$value]['action'];
        $this->classLink = $dados[$value]['classLink'];
        $this->classIcon = $dados[$value]['classIcon'];
    }

    /**
     * @param string $link
     * @param string $description
     */
    public function formDelete(string $link, string $description)
    {
        $dados = Configure::read('JeffersonSimaoGoncalves/Utils.RenderForm.formDelete');
        $this->link = $link;
        $this->classLink = $dados['classLink'];
        $this->classIcon = $dados['classIcon'];
        $this->confirmBox = true;
        $this->confirmText = 'Tem certeza de que deseja excluir # "<b>' . $description . '</b>"?';
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        $return = 'form_post_' . $this->action . '_' . $this->id;
        $return = Text::slug($return, ['replacement' => '_']);

        return strtolower($return);
    }

}
