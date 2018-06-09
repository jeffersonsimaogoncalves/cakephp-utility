<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Simão Gonçalves
 * Email: gerson.simao.92@gmail.com
 * GitHub: https://github.com/jeffersonsimaogoncalves
 * Date: 09/06/2018
 * Time: 12:32
 */

namespace JeffersonSimaoGoncalves\Utils\View\Helper;

use Cake\View\Helper\UrlHelper as CakeUrl;
use JeffersonSimaoGoncalves\Utils\Lib\RouteTrait;

/**
 * Class UrlHelper
 *
 * @package App\View\Helper
 */
class UrlHelper extends CakeUrl
{
    use RouteTrait;

    /**
     * @param string|array|null $url
     * @param array|bool $options
     *
     * @return string
     */
    public function build($url = null, $options = false)
    {
        return parent::build($this->parseDefaults($url), $options);
    }
}