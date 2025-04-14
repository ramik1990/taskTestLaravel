<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'importance' => $this->importance,
            'deadline' => $this->deadline,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
        if (request()->routeIs('tasks.priority')) {
            $data['is_overdue'] = $this->deadline < now();
            $daysUntilDeadline = max(now()->diffInDays($this->deadline, false), 1);
            $data['priority_score'] = round($this->importance * (1 / $daysUntilDeadline), 2);
        }
    
        return $data;
    }
}
