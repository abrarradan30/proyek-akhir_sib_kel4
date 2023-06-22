<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
{
<<<<<<< HEAD
    public $status;
    public $message;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
=======
>>>>>>> a400d8617bd9a354fd921ad3ecf5a3501d9d96e0
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
<<<<<<< HEAD
        // return parent::toArray($request);
        return[
            'success'=>$this->status,
            'message'=>$this->message,
            'data'=>$this->resource,
        ];
=======
        return parent::toArray($request);
>>>>>>> a400d8617bd9a354fd921ad3ecf5a3501d9d96e0
    }
}
