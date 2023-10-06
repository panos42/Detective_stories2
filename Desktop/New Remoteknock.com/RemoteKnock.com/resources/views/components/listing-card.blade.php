<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >




@props(['listing'])

@php
    // Import Carbon class
    use Carbon\Carbon;
@endphp



<x-card class="rounded-lg" onclick="window.open('/listings/{{$listing->id}}', '_blank');" style="cursor: pointer;">
    <table>
        <tr>
            <td class="circular-logo" style="vertical-align: middle;">

                <img class="circular-logo " src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/default-listing.png')}}" alt="" />
            </td>
            <td class="px-4">
          
                <h3 class="job_title font-awesome" style="max-width: calc(100% - 20px);"> <!-- Adjust the value based on your padding -->
                    {{$listing->title}}
                </h3>
                <div class="company_title">
                    {{$listing->company}}
                </div>
                <div class="flex items-center"> 
                    <div class="gradient_border_card ml-4">
                        <div class="location_card">

                    <div class="location_name">
                        {{$listing->location}}
                    </div>
                    </div>
                    </div>

                    {{-- <div class="gradient_border_card ml-4">
                        <div class="salary_card">
                            <span class="salary">{{ $listing->min_salary }}</span> - <span class="salary">{{ $listing->max_salary }}</span>💸
                        </div>
                    </div> --}}
                </div>
                
                <td class="px-5 hidden md:table-cell tags-cell" style="width: auto;  overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                    <x-listing-tags :tagsCsv="$listing->tags" />
                </td>
            </td>
           
            
            
            <td class="px-5" style="width: 62.8px;"> 
                <div class="date_card" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                    {{ Carbon::parse($listing->created_at)->diffForHumans() }}
                </div>
            </td>
        </tr>
    </table>
</x-card>




<!-- Add this script section at the bottom of your template, before the closing </body> tag -->
<!-- Update the formatSalary() function in the script section -->
<script>
    function formatSalary(salary) {
        if (salary >= 1000) {
            return Math.floor(salary / 1000) + 'k';
        } else {
            return salary;
        }
    }

    // Get all elements with class "salary" and format their content
    document.addEventListener('DOMContentLoaded', function() {
        const salaryElements = document.querySelectorAll('.salary');
        salaryElements.forEach(element => {
            const originalSalary = parseFloat(element.textContent);
            if (!isNaN(originalSalary)) {
                element.textContent = '$' + formatSalary(originalSalary);
            }
        });
    });
</script>