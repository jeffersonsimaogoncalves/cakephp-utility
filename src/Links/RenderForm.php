<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:36
 */

namespace JeffersonSimaoGoncalves\Utils\Links;

/**
 * Class RenderForm
 *
 * @property bool confirmBox
 * @property string confirmText
 * @property string action
 * @property string id
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
    }

    /**
     * @param string $link
     * @param bool $status
     */
    public function formStatus(string $link, bool $status)
    {
        $this->link = $link;
        $this->action = ($status) ? 'inactivate' : 'activate';
        $this->classLink = ($status) ? 'btn-warning' : 'btn-success';
        $this->classIcon = ($status) ? 'glyphicon-ban-circle' : 'glyphicon-ok-circle';
    }

    /**
     * @param string $link
     * @param string $description
     */
    public function formDelete(string $link, string $description)
    {
        $this->link = $link;
        $this->classLink = 'btn-danger';
        $this->classIcon = 'glyphicon-trash';
        $this->confirmBox = true;
        $this->confirmText = 'Tem certeza de que deseja excluir # "<b>' . $description . '</b>"?';
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        $return = 'form_post_' . $this->action . '_' . $this->id;
        $return = str_replace('-', '_', $return);

        return strtolower($return);
    }

}
