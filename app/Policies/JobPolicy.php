<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\JobApplicant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    // NOTE:
    // when there are multiple controllers are using
    // the same resource (eg. job) then we use the 
    // resource policy for both of them adding custom
    // methods (abilities) and we call them explicitly
    // inside the corresponding controller

    // this ability to be used in (JobController/index)
    public function viewAny(?User $user): bool
    {
        return true;
    }

    // this ability to be used in (MyJobController/index)
    public function viewAnyForEmployer(User $user): bool
    {
        // since there is a middleware to ensure that the user is 
        // employer we can return true directly, no need to check
        // for that again.
        return true;
    }

    // this ability to be used in (JobController/show)
    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    // this ability to be used in (MyJobController/create)
    public function create(User $user): bool
    {
        return true;
    }

    // this ability to be used in (MyJobController/update)
    public function update(User $user, Job $job): bool|Response
    {
        if ($job->company->employer_id != $user->id) {
            return response::deny('لا يمكنك تعديل وظيفة لا تملكها');
        }
        if ($job->applicants()->count() > 0) {
            return response::deny('لا يمكن تعديل الوظيفة؛ لوجود متقدمين');
        }

        return true;
    }

    // this ability to be used in (MyJobController/delete)
    public function delete(User $user, Job $job): bool|Response
    {
        if ($job->company->employer_id != $user->id) {
            return response::deny('لا يمكنك حذف وظيفة لا تملكها');
        }
        if ($job->applicants()->count() > 0) {
            return response::deny('لا يمكن حذف الوظيفة؛ لوجود متقدمين');
        }

        return true;
    }

    // this ability to be used in (MyJobController/delete)
    public function restore(User $user, Job $job): bool|Response
    {
        if ($job->company->employer_id != $user->id) {
            return response::deny('لا يمكنك حذف وظيفة لا تملكها');
        }
        if ($job->applicants()->count() > 0) {
            return response::deny('لا يمكن حذف الوظيفة؛ لوجود متقدمين');
        }

        return true;
    }

    // this ability to be used in (MyJobController/delete)
    public function forceDelete(User $user, Job $job): bool|Response
    {
        if ($job->company->employer_id != $user->id) {
            return response::deny('لا يمكنك حذف وظيفة لا تملكها');
        }
        if ($job->applicants()->count() > 0) {
            return response::deny('لا يمكن حذف الوظيفة؛ لوجود متقدمين');
        }

        return true;
    }

    public function apply(User $user, Job $job): bool
    {
        // return !JobApplicant::where('applicant_id', $user->id)->where('job_id', $job->id)->exists();
        return !$user->isAppliedToJob($job);
    }
}
