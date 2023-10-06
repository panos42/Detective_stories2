<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    // public function scopeFilter($query, array $filters) {
    //    // dd($filters); // Check if the min_salary value is being passed correctly
    //     if($filters['tag'] ?? false) {
    //         $query->where('tags', 'like', '%' . request('tag') . '%');
    //     }
    //     if ($filters['min_salary'] ?? false) {
    //         $minSalary = (int) str_replace(',', '', $filters['min_salary']); // Convert to integer
    //         $query->where('min_salary', '>=', $minSalary);
    //     }
    

    //     if($filters['search'] ?? false) {
    //         $query->where('title', 'like', '%' . request('search') . '%')
    //             ->orWhere('description', 'like', '%' . request('search') . '%')
    //             ->orWhere('tags', 'like', '%' . request('search') . '%');
    //     }
    // }

    public function scopeFilter($query, $filters) {
        if ($filters['tag']?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if ($filters['min_salary'] ?? false) {
                    $minSalary = (int) str_replace(',', '', $filters['min_salary']); // Convert to integer
                    $query->where('min_salary', '>=', $minSalary);
                }

        if ($filters['location'] ?? false) {
            $query->where('location', 'like', '%' . $filters['location'] . '%');
        }

        if ($filters['job_position'] ?? false) {
            $query->where('title', 'like', '%' . $filters['job_position'] . '%');
        }

        return $query;
    }
    

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}