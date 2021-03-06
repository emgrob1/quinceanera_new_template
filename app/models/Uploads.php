<?php

class Uploads extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $file_name;

    /**
     *
     * @var string
     */
    public $date_time_stamp;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'uploads';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uploads[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uploads
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
