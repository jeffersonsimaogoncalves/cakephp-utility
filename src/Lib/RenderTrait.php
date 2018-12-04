<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 30/05/2018
 * Time: 11:33
 */

namespace JeffersonSimaoGoncalves\Utils\Lib;

use JeffersonSimaoGoncalves\Utils\Links\RenderForm;
use JeffersonSimaoGoncalves\Utils\Links\RenderLink;
use JeffersonSimaoGoncalves\Utils\TypeLink;

/**
 * Trait RenderTrait
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Lib
 */
trait RenderTrait
{
    use HtmlTrait;

    /**
     * @param \JeffersonSimaoGoncalves\Utils\Links\RenderLink $renderLink
     *
     * @return string
     */
    public function renderLink(RenderLink $renderLink)
    : string
    {
        $params = ['href' => $renderLink->link];
        if (isset($renderLink->classLink)) {
            $params['class'] = $renderLink->getPrefixClassLink() . ' ' . $renderLink->classLink;
        }
        if ($renderLink->blank) {
            $params['target'] = '_blank';
        }
        if ($renderLink->modalView) {
            $params['data-toggle'] = 'modal';
            $params['data-target'] = '#' . $renderLink->modalViewTarget;
        }
        if ($renderLink->typeLink === TypeLink::LINK && !empty($renderLink->title)) {
            return $this->a($params, $renderLink->title);
        } else if (!empty($renderLink->title)) {
            $params['title'] = $renderLink->title;
        }

        return $this->a($params, $this->i(['class' => $renderLink->getClassIcon()]));
    }

    /**
     * @param \JeffersonSimaoGoncalves\Utils\Links\RenderForm $renderForm
     *
     * @return string
     */
    public function renderForm(RenderForm $renderForm)
    : string
    {
        $formName = $renderForm->getFormName();
        if ($renderForm->confirmBox) {
            $json = CallbackFunction::resolve(json_encode(['message' => $renderForm->confirmText, 'buttons' => ['confirm' => ['label' => '<i class="fa fa-check"></i> Sim', 'className' => 'btn-primary'], 'cancel' => ['label' => '<i class="fa fa-times"></i> Não', 'className' => 'btn-default']], 'callback' => new CallbackFunction('function (result) {if (result){ document.' . $formName . '.submit(); }}')]));

            $eventOnClick = "bootbox.confirm({$json}); event.returnValue = false; return false;";
        } else {
            $eventOnClick = 'document.' . $formName . '.submit(); event.returnValue = false; return false;';
        }

        $input = $this->input(['type' => 'hidden', 'name' => '_method', 'class' => 'form-control', 'value' => 'POST']);
        $form = $this->form(['class' => 'hidden invisible', 'style' => 'display: none;', 'name' => $formName, 'method' => 'post', 'action' => $renderForm->link], $input);
        $div = $this->div(['class' => 'hidden invisible', 'style' => 'display: none;'], $form);

        $content = $div . (!empty($renderForm->title) ? $renderForm->title : $this->i(['class' => $renderForm->getClassIcon()]));

        return $this->a(['href' => '#', 'class' => $renderForm->getClassLink(), 'onclick' => $eventOnClick], $content);
    }
}