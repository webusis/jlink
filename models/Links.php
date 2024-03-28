<?php
namespace models;
use helpers\BaseMethods;

class Links extends BaseModel {
    protected $table = 'links';

    protected $columns = [
        'id',
        'pid' => 'ID человека',
        'olink' => 'Изначальная ссылка',
        'tlink' => 'Результирующая ссылка',
        'trlink' => 'Счетчик переходов'
    ];

    protected $valid_params = [
//        'regexp' => [
//            'olink' => [
//                '^[a-zа-я]+$'
//            ],
//            'tlink' => [
//                '^[a-zа-я]+$'
//            ]
//        ],
        'req' => [['olink','tlink']]
    ];

    /**
     * @throws \components\ExceptionHandler
     */
    public function __construct(){
        parent::__construct($this);
    }

    /**
     * @return array|false
     * @throws \components\ExceptionHandler
     */
    public function find(){
        return parent::find();
    }

    /**
     * @return array|false|string
     * @throws \components\ExceptionHandler
     */
    public function create() : array|string|false {
        return parent::create(', ');
    }

    /**
     * @return bool
     * @throws \components\ExceptionHandler
     */
    public function update() : bool {
        return parent::update();
    }

    /**
     * @return bool
     * @throws \components\ExceptionHandler
     */
    public function delete() : bool {
        return parent::delete();
    }

    /**
     * @return mixed|string[]
     */
    public function clTr() : array {
        return $this->columns;
    }
}
