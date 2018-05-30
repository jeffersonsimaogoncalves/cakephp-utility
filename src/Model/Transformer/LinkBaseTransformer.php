<?php
/**
 * Created by PhpStorm.
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:47
 */

namespace JeffersonSimaoGoncalves\Utils\Model\Transformer;

use JeffersonSimaoGoncalves\Utils\Lib\RenderTrait;
use League\Fractal\TransformerAbstract;

/**
 * Class LinkBaseTransformer
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Model\Transformer
 */
abstract class LinkBaseTransformer extends TransformerAbstract
{
    use RenderTrait;
}
