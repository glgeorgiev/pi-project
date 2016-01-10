<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @var string
     */
    protected $referer;
    /**
     * @var array
     */
    protected $refererSegments;
    /**
     * @var int
     */
    protected $refererSegmentsCount;
    /**
     * @var bool
     */
    protected $isEdit;
    /**
     * @var int
     */
    protected $entityId;

    public function __construct()
    {
        $this->referer = request()->server('HTTP_REFERER');
        if (is_null($this->referer)) {
            return;
        }
        $this->refererSegments = array_filter(explode('/', $this->referer));
        $this->refererSegmentsCount = count($this->refererSegments);
        if (strcasecmp($this->refererSegments[$this->refererSegmentsCount], 'edit') == 0) {
            $this->isEdit = true;
            $this->entityId = intval($this->refererSegments[$this->refererSegmentsCount - 1]);
        } else {
            $this->isEdit = false;
            $this->entityId = 0;
        }
    }
}
