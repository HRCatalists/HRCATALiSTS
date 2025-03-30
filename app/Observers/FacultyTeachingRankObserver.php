<?php

namespace App\Observers;

use App\Models\FacultyTeachingRank;

class FacultyTeachingRankObserver
{
 
    public function saving(FacultyTeachingRank $facultyTeachingRank)
    {
        $facultyTeachingRank->calculateTotalPoints();
    }

    /**
     * Handle the FacultyTeachingRank "created" event.
     */
    public function created(FacultyTeachingRank $facultyTeachingRank): void
    {
        //
    }

    /**
     * Handle the FacultyTeachingRank "updated" event.
     */
    public function updated(FacultyTeachingRank $facultyTeachingRank): void
    {
        //
    }

    /**
     * Handle the FacultyTeachingRank "deleted" event.
     */
    public function deleted(FacultyTeachingRank $facultyTeachingRank): void
    {
        //
    }

    /**
     * Handle the FacultyTeachingRank "restored" event.
     */
    public function restored(FacultyTeachingRank $facultyTeachingRank): void
    {
        //
    }

    /**
     * Handle the FacultyTeachingRank "force deleted" event.
     */
    public function forceDeleted(FacultyTeachingRank $facultyTeachingRank): void
    {
        //
    }
}
