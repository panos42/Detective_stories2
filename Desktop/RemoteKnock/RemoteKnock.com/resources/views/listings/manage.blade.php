<x-layout>
  <x-card class="p-10">
    <header>
      <h1 class="text-3xl manage-listings-title font-bold my-6 uppercase" style="color: #ccc">
        Manage Job Listings
      </h1>
    </header>

    <div class="grid grid-cols-1 gap-4">
      {{-- Loop through listings --}}
      @unless($listings->isEmpty())
      @foreach($listings as $listing)
      <div class="edit-card shadow-md">
        <div class="job-info">
          <a href="/listings/{{$listing->id}}" class="listing_class">{{$listing->title}} - {{$listing->company}}</a>
        </div>
        <div class="button-container">
          <a href="/listings/{{$listing->id}}/edit" class="custom-link"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
          <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="custom-button"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
        </div>
      </div>
      @endforeach
      @else
      {{-- No listings found --}}
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <p class="text-center">No Listings Found</p>
        </td>
      </tr>
      @endunless
    </div>

    <style>
          .text-center{
        color: rgb(255, 72, 0);
        text-align: center;
        margin-top: 2rem;
        font-size: 1.5rem;
    }
    .manage-listings-title{
      text-align: center;
      font-size: 3rem;
    }
      /* Define your custom classes */
      .edit-card {
        width: 70%;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
      }

      .job-info {
        color: #ccc;
        font-size: 20px;
        width: 70%;
        margin-right: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .button-container {
        display: flex;
        align-items: center;
      }

      /* Rest of your custom styles for other elements */
      .custom-td {
        color: #0073e6;
        padding: 8px 4px;
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        font-size: 16px;
      }

      .custom-link {
        font-size:1.5rem;
        color: #0073e6;
        padding: 2px 6px;
        border-radius: 8px;
        text-decoration: none;
        margin-right: 1rem;
      }

      .custom-button {
        font-size:1.5rem;
        color: #ff0000;
        border: none;
        background: none;
        cursor: pointer;
      }


      @media (max-width: 767px) {

        .custom-link {
        font-size:1rem;
        color: #0073e6;
        padding: 2px 6px;
        border-radius: 8px;
        text-decoration: none;
        margin-right: 0.2rem;
      }

      .custom-button {
        font-size:1rem;
        color: #ff0000;
        border: none;
        background: none;
        cursor: pointer;
      }


        .manage-listings-title{
          font-size: 1.5rem;
        }
        .edit-card {
        width: 90%;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
      }
      }
    </style>
  </x-card>
</x-layout>
