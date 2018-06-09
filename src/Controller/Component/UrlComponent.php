<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Simão Gonçalves
 * Email: gerson.simao.92@gmail.com
 * GitHub: https://github.com/jeffersonsimaogoncalves
 * Date: 09/06/2018
 * Time: 12:44
 */

namespace JeffersonSimaoGoncalves\Utils\Controller\Component;

use Cake\Controller\Component;
use JeffersonSimaoGoncalves\Utils\Lib\RouteTrait;

/**
 * Class UrlComponent
 *
 * @author Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utils\Controller\Component
 */
class UrlComponent extends Component
{
    use RouteTrait;

    /**
     * @param string $url
     *
     * @return array|string
     */
    public function parseUrl(string $url)
    {
        return $this->parseDefaults($url);
    }
}