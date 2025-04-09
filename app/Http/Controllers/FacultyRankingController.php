<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FacultyTeachingRank1;
use App\Models\FacultyTeachingRank2; // Import FacultyTeachingRank2 model
use App\Models\FacultyTeachingRank3;
use App\Models\FacultyTeachingRank4;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use App\Models\FacultyTeachingSummary;



class FacultyRankingController extends Controller
{
    private function isSecretary()
    {
        return Auth::check() && Auth::user()->role === 'secretary';
    }
    // EMS Faculty Ranking page
    public function ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-faculty-ranking');
    }

                    // EMS Non-Faculty Ranking page
      public function search(Request $request)
            {
             try {
                      Log::info('Search Request Data:', $request->all());
                    
                       $rankType = $request->input('rank_type', 'rank1');
                    
                      switch ($rankType) {
                             case 'rank2':
                      $query = FacultyTeachingRank2::query();
                                    break;
                              case 'rank3':
                                    $query = FacultyTeachingRank3::query();
                                    break;
                                case 'rank4':
                                    $query = FacultyTeachingRank4::query();
                                    break;
                                default:
                                    $query = FacultyTeachingRank1::query();
                            }
                    
                            // 🆕 Match using individual fields
                            if ($request->filled('first_name')) {
                                $query->whereHas('employee', function ($q) use ($request) {
                                    $q->where('first_name', 'like', '%' . $request->first_name . '%');
                                });
                            }
                    
                            if ($request->filled('last_name')) {
                                $query->whereHas('employee', function ($q) use ($request) {
                                    $q->where('last_name', 'like', '%' . $request->last_name . '%');
                                });
                            }
                    
                            if ($request->filled('department')) {
                                $query->whereHas('employee', function ($q) use ($request) {
                                    $q->where('department', 'like', '%' . $request->department . '%');
                                });
                            }
                    
                            $faculties = $query->with('employee')->get();
                    
                            if ($faculties->isEmpty()) {
                                return response()->json(['message' => 'No results found'], 404);
                            }
                    
                            return response()->json($faculties);
                    
                        } catch (\Exception $e) {
                            Log::error('Search Error: ' . $e->getMessage());
                            return response()->json([
                                'message' => 'An error occurred while searching',
                                'error' => $e->getMessage(),
                                'stack' => $e->getTraceAsString()
                            ], 500);
                        }
                    }
                    
            // Save total points after calculating them
            public function saveTotalPoints(Request $request)
            {
                if ($this->isSecretary()) {
                    return redirect()->back()->with('error', 'You do not have permission to perform this action.');
                }
            
                if (!Auth::check()) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
            
                // Validate required emp_id
                $validated = $request->validate([
                    'emp_id' => 'required|exists:teaching_rank1,emp_id',
                ]);
            
                try {
                    // Fetch Rank 1 record
                    $faculty = FacultyTeachingRank1::where('emp_id', $validated['emp_id'])->first();
            
                    if (!$faculty) {
                        return response()->json(['error' => 'Faculty not found'], 404);
                    }
            
                    // Log incoming request (optional for debugging)
                    Log::info('Rank 1 Save Request:', $request->all());
            
                    // List of fields to update
                    $fields = [
                        'bachelor_degree',
                        'academic_units_master_degree',
                        'ma_ms_candidate',
                        'masters_thesis_completed',
                        'full_master_degree',
                        'academic_units_doctorate_degree',
                        'phd_education',
                        'doctorate_dissertation_completed',
                        'full_doctorate_degree',
                        'additional_bachelor_degree',
                        'additional_master_degree',
                        'additional_doctorate_degree',
                        'multiple_degrees',
                        'specialized_training',
                        'travel_grant_for_study',
                        'seminars_attended',
                        'professional_education_units',
                        'plumbing_certification',
                        'certificate_of_completion',
                        'national_certification',
                        'trainers_methodology',
                        'teachers_board_certified',
                        'career_service_certification',
                        'bar_exam_certification',
                        'board_exam_placer',
                        'local_awards',
                        'regional_awards',
                        'national_awards',
                        'summa_cum_laude',
                        'magna_cum_laude',
                        'cum_laude',
                        'with_distinction',
                        
                    ];
            
                    // Loop and assign each field from the request
                    foreach ($fields as $field) {
                        $faculty->$field = $request->input($field, 0);
                    }
            
                    // ✅ Save the totalPointsI sent from the frontend
                    Log::info('Saving total_points as: ' . $faculty->total_points);
                    $faculty->total_points = $request->input('total_points', 0);
            
                    $faculty->save();
            
        
                
            
                    return response()->json([
                        'success' => true,
                        'message' => 'Faculty ranking saved successfully.',
                        'data' => $faculty
                    ]);
            
                } catch (\Exception $e) {
                    Log::error('Rank 1 Save Error: ' . $e->getMessage());
            
                    return response()->json([
                        'error' => 'Server error: ' . $e->getMessage()
                    ], 500);
                }
            }
    
            public function saveTotalPoints2(Request $request)
        {
            if ($this->isSecretary()) {
                return redirect()->back()->with('error', 'You do not have permission to perform this action.');
            }

            if (!Auth::check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $validated = $request->validate([
                'emp_id' => 'required|exists:employees,id',
            ]);

            try {
                // Create or update the Rank 2 record
                $faculty = FacultyTeachingRank2::firstOrNew(['emp_id' => $validated['emp_id']]);
                $faculty->emp_id = $validated['emp_id'];

                $fields = [
                    'full_time_cc', 'full_time_other_schools', 'part_time_cc', 'part_time_other_schools',
                    'research_school_based',
                    'course_module', 'workbook_lab_manual', 'research_articles', 'journal_editorship',
                    'participation_chairman', 'participation_member',
                    'resource_person_within', 'resource_person_outside',
                    'membership_officer_accreditor', 'membership_member'
                ];

                foreach ($fields as $field) {
                    $faculty->$field = $request->input($field, 0);
                }

                Log::info('Saving total_points as: ' . $faculty->total_points);
                    $faculty->total_points = $request->input('total_points', 0);
            
                    $faculty->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Rank 2 points saved successfully.',
                    'data' => $faculty
                ]);
            } catch (\Exception $e) {
                \Log::error('Rank 2 Save Error: ' . $e->getMessage());
                return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
            }
        }


        public function saveTotalPoints3(Request $request)
        {
            $request->validate([
                'emp_id' => 'required|exists:employees,id',
                'classroom_evaluation' => 'required|numeric|min:0|max:50',
                'work_evaluation' => 'required|numeric|min:0|max:50',
            ]);

            $classroom = $request->input('classroom_evaluation');
            $work = $request->input('work_evaluation');
            $total = $classroom + $work;
            $percentage = $total * 0.35;

            $faculty = FacultyTeachingRank3::updateOrCreate(
                ['emp_id' => $request->emp_id],
                [
                    'classroom_evaluation' => $classroom,
                    'work_evaluation' => $work,
                    'total_points' => $total,
                    'total_percentage' => $percentage,
                ]
            );

            return response()->json(['success' => true, 'data' => $faculty]);
        }

    public function saveTotalPoints4(Request $request)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        try {
            

            $validated = $request->validate([
                'emp_id' => 'required|exists:teaching_rank4,emp_id',
                'attendance_activities' => 'nullable|in:0,30',
                'committee_involvement' => 'nullable|in:0,30',
                'community_extension' => 'nullable|in:0,40',
            ]);

            $faculty = \App\Models\FacultyTeachingRank4::where('emp_id', $validated['emp_id'])->first();

            if (!$faculty) {
                return response()->json(['error' => 'Faculty not found'], 404);
            }

            $faculty->attendance_activities = $request->input('attendance_activities', 0);
            $faculty->committee_involvement = $request->input('committee_involvement', 0);
            $faculty->community_extension = $request->input('community_extension', 0);

            $faculty->total_points = 
                $faculty->attendance_activities + 
                $faculty->committee_involvement + 
                $faculty->community_extension;

            $faculty->total_percentage = $faculty->total_points * 0.15;

            $faculty->save();

            return response()->json(['success' => true, 'data' => $faculty]);
        } catch (\Exception $e) {
            \Log::error("Rank 4 Save Error: " . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
     

}
            public function saveSummary(Request $request)
            {
                $empId = $request->input('emp_id');

                $rank1 = FacultyTeachingRank1::where('emp_id', $empId)->first();
                $rank2 = FacultyTeachingRank2::where('emp_id', $empId)->first();
                $rank3 = FacultyTeachingRank3::where('emp_id', $empId)->first();
                $rank4 = FacultyTeachingRank4::where('emp_id', $empId)->first();

                if (!$rank1 || !$rank2 || !$rank3 || !$rank4) {
                    return response()->json(['error' => 'Incomplete ranks'], 422);
                }

                $a = $rank1->total_points;
                $b = $rank2->total_Points;
                $c = $rank3->total_points;
                $d = $rank4->total_points;

                $weightedTotal = ($a * 0.30) + ($b * 0.20) + ($c * 0.35) + ($d * 0.15);

                $finalRank = $this->getRankFromScore($weightedTotal);

                $summary = FacultyTeachingSummary::updateOrCreate(
                    ['emp_id' => $empId],
                    [
                        'academy_preparation_other_qualifications' => $a,
                        'teaching_and_work_exp' => $b,
                        'faculty_performance' => $c,
                        'corporate_commitment' => $d,
                        'old_score' => $weightedTotal,
                        'old_rank' => $finalRank,
                    ]
                );

                return response()->json(['success' => true, 'summary' => $summary]);
            }

            private function getRankFromScore($score)
            {
                if ($score >= 95) return "Professor";
                if ($score >= 85) return "Associate Professor";
                if ($score >= 75) return "Assistant Professor";
                if ($score >= 65) return "Instructor";
                return "Needs Review";
            }

            public function non_ranking()
            {
                if (!Auth::check()) {
                    return redirect()->route('login');
                }
                return view('hrcatalists.ems.admin-ems-non-teaching');
            }
        
    }

