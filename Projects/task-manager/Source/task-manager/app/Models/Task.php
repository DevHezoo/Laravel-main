<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'priority', 'project_id'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // ---------- Scopes ----------
    public function scopeForProject($query, $projectId)
    {
        if ($projectId !== null) {
            return $query->where('project_id', $projectId);
        }
        return $query;
    }

    public function scopeOrdered($query)
    {
        // Order by project first (optional), then by priority
        return $query->orderBy('project_id')->orderBy('priority', 'asc');
    }

    // ---------- Helpers ----------
    public static function getMaxPriorityForProject($projectId)
    {
        return static::where('project_id', $projectId)->max('priority') ?? 0;
    }

    public static function recalculatePriorities($projectId)
    {
        $tasks = self::forProject($projectId)->ordered()->get();
        foreach ($tasks as $index => $task) {
            $task->priority = $index + 1;
            $task->save();
        }
    }
}