<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'primary_emotion' => $this->primary_emotion->name,
            'primary_emotion_photo' => url($this->primary_emotion->photo),
            'secondary_emotion' => $this->secondary_emotion->name,
            'journal' => $this->journal,
            'stress-analysis' => $this->stress_analysis,
            'depression-analysis' => $this->depression_analysis,
            'activities' => $this->activities->pluck('name'),
            'reasons' => $this->reasons->pluck('name'),
            'tip' => $this->tip->tip,
            'tip_description' => $this->tip->description,
        ];
    }
}
