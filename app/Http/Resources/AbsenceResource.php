<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbsenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        
        [
            'id' => $this->id,
            'date' => $this->date,
            'absenceHours' => $this->absenceHours,
            'student' => $this->student->name,
            'teacher' => $this->teacher->name,
            'subject' => $this->subject->name,
        ];
    }
}
