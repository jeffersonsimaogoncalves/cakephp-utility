<?php

use Cake\Core\Configure;

Configure::write('JeffersonSimaoGoncalves/Utility.TableUtility', [
    'class' => 'table table-bordered table-striped table-responsive',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderForm.formStatus', [
    'activate'   => [
        'action'    => 'activate',
        'classLink' => 'btn btn-success',
        'classIcon' => 'glyphicon glyphicon-ok-circle',
    ],
    'inactivate' => [
        'action'    => 'inactivate',
        'classLink' => 'btn btn-warning',
        'classIcon' => 'glyphicon glyphicon-ban-circle',
    ],
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderForm.formDelete', [
    'classLink' => 'btn btn-danger',
    'classIcon' => 'glyphicon glyphicon-trash',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkView', [
    'classLink' => 'btn btn-default',
    'classIcon' => 'glyphicon glyphicon-eye-open',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkImage', [
    'classLink' => 'btn btn-success imageview',
    'classIcon' => 'fa fa-picture-o',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkAdd', [
    'classLink' => 'btn btn-success',
    'classIcon' => 'glyphicon glyphicon-plus',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkBack', [
    'classLink' => 'btn btn-default',
    'classIcon' => 'glyphicon glyphicon-list',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkEdit', [
    'classLink' => 'btn btn-primary',
    'classIcon' => 'glyphicon glyphicon-pencil',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkPdf', [
    'classLink' => 'btn btn-success',
    'classIcon' => 'fa fa-file-pdf-o',
]);
Configure::write('JeffersonSimaoGoncalves/Utility.RenderLink.linkAccept', [
    'classLink' => 'btn btn-success',
    'classIcon' => 'fa fa-check-circle',
]);

// Optionally load additional queue config defaults from local app config
if (file_exists(ROOT . DS . 'config' . DS . 'cake_utils.php')) {
    Configure::load('cake_utils');
}
