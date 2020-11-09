<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 25/05/2018
 * Time: 13:47
 */

namespace JeffersonSimaoGoncalves\Utility\Model\Transformer;

use JeffersonSimaoGoncalves\Utility\Lib\RenderTrait;
use League\Fractal\TransformerAbstract;

/**
 * Class LinkBaseTransformer
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utility\Model\Transformer
 */
abstract class LinkBaseTransformer extends TransformerAbstract
{
    use RenderTrait;
}
