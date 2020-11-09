<?php
/**
 * User: jeffersonsimaogoncalves
 * Date: 23/05/2018
 * Time: 23:31
 */

namespace JeffersonSimaoGoncalves\Utility;

use Cake\Core\Configure;

/**
 * Class TableUtility
 *
 * @property string table
 * @property array columns
 * @property int|array count
 * @property array data
 * @property array order
 * @property string url
 *
 * @author  Jefferson Simão Gonçalves <gerson.simao.92@gmail.com>
 *
 * @package JeffersonSimaoGoncalves\Utility
 */
class TableUtility
{
    /**
     * @return array
     */
    public function getClass()
    : array
    {
        return [
            'class' => Configure::read('JeffersonSimaoGoncalves/Utility.TableUtility.class'),
        ];
    }

    /**
     * @param int $countFiltered
     * @param int $countTotal
     */
    public function setCount($countFiltered, $countTotal)
    {
        $this->count = ($countFiltered < $countTotal) ? [$countFiltered, $countTotal] : $countTotal;
    }

    /**
     * @return array
     */
    public function getOptions()
    : array
    {
        $data = [
            'data'         => $this->data,
            'deferLoading' => $this->count,
            'columns'      => $this->columns,
            'order'        => $this->order,
        ];

        if (isset($this->url)) {
            $data['ajax'] = [
                'url' => $this->url,
            ];
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getTable()
    : string
    {
        return strtolower($this->table) . '-table';
    }
}
