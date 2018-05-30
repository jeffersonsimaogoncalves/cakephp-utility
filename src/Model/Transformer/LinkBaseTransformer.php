<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:47
 */

namespace JeffersonSimaoGoncalves\Utils\Model\Transformer;

use HtmlGenerator\HtmlTag;
use JeffersonSimaoGoncalves\Utils\Lib\CallbackFunction;
use JeffersonSimaoGoncalves\Utils\Lib\HtmlTrait;
use JeffersonSimaoGoncalves\Utils\Links\RenderForm;
use JeffersonSimaoGoncalves\Utils\Links\RenderLink;
use JeffersonSimaoGoncalves\Utils\TypeLink;
use League\Fractal\TransformerAbstract;

/**
 * Class LinkBaseTransformer
 *
 * @package JeffersonSimaoGoncalves\Utils\Model\Transformer
 */
abstract class LinkBaseTransformer extends TransformerAbstract
{
    use HtmlTrait;

    /**
     * @param \JeffersonSimaoGoncalves\Utils\Links\RenderLink $renderLink
     *
     * @return string
     */
    public function renderLink(RenderLink $renderLink): string
    {
        $params = ['href' => $renderLink->link];
        if (isset($renderLink->classLink)) {
            $params['class'] = $renderLink->getPrefixClassLink() . ' ' . $renderLink->classLink;
        }
        if ($renderLink->blank) {
            $params['target'] = '_blank';
        }
        if ($renderLink->typeLink === TypeLink::LINK && !empty($renderLink->title)) {
            return $this->a($params, $renderLink->title);
        }

        return $this->a($params, $this->i(['class' => $renderLink->getPrefixClassIcon() . ' ' . $renderLink->classIcon]));
    }

    /**
     * @param \JeffersonSimaoGoncalves\Utils\Links\RenderForm $renderForm
     *
     * @return string
     */
    public function renderForm(RenderForm $renderForm): string
    {
        $formName = $renderForm->getFormName();
        if ($renderForm->confirmBox) {
            $json = CallbackFunction::resolve(json_encode(['message' => $renderForm->confirmText, 'buttons' => ['confirm' => ['label' => '<i class="fa fa-check"></i> Sim', 'className' => 'btn-primary'], 'cancel' => ['label' => '<i class="fa fa-times"></i> Não', 'className' => 'btn-default']], 'callback' => new CallbackFunction('function (result) {if (result){ document.' . $formName . '.submit(); }}')]));

            $eventOnClick = "bootbox.confirm({$json}); event.returnValue = false; return false;";
        } else {
            $eventOnClick = 'document.' . $formName . '.submit(); event.returnValue = false; return false;';
        }
        $linkPrefix = $renderForm->getPrefixClassLink();
        $iconPrefix = $renderForm->getPrefixClassIcon();

        $divParams = $this->formatAttributes(['class' => 'hidden invisible', 'style' => 'display: none;']);
        $formParams = $this->formatAttributes(['class' => 'hidden invisible', 'style' => 'display: none;', 'name' => $formName, 'method' => 'post', 'action' => $renderForm->link]);
        $inputParams = $this->formatAttributes(['type' => 'hidden', 'name' => '_method', 'class' => 'form-control', 'value' => 'POST']);

        $i = $this->i(['class' => $iconPrefix . ' ' . $renderForm->classIcon]);

        $content = HtmlTag::createElement('div')->set($divParams)->text(HtmlTag::createElement('form')->set($formParams)->text(HtmlTag::createElement('input')->set($inputParams))) . $i;

        return $this->a(['href' => '#', 'class' => $linkPrefix . ' ' . $renderForm->classLink, 'onclick' => $eventOnClick], $content);
    }
}
