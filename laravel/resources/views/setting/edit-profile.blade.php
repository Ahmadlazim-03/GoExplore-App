<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Edit Profile
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="bg-gradient-to-r from-blue-100 to-purple-100 font-roboto">
  <div class="container mx-auto p-6">
   <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-center text-black">
     Edit Profile
    </h2>
    <div class="flex justify-center mb-6">
     <img alt="Profile picture placeholder, a simple gray square with rounded corners" class="rounded-full w-24 h-24" height="100" src="{{ asset('img/'.Auth::user()->profile_picture) }}" width="100"/>
    </div>


    <form action="editprofile" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Profile Picture -->
    <div class="mb-4">
      <div class="flex justify-center items-center">
       <label class="bg-purple-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500" for="profile-picture">
        Choose File
       </label>
       <input class="hidden" id="profile-picture" name="profile_picture" type="file"/>
       <span class="ml-3 text-gray-600" id="file-name">
       </span>
      </div>

    <!-- Name -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="username">Name</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="username" name="name" placeholder="Enter your username" type="text"
            value="{{ Auth::user()->name }}" />
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="email" name="email" placeholder="Enter your email" type="email"
            value="{{ Auth::user()->email }}" />
    </div>

    <!-- Contact -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="contact">Contact</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="contact" name="contact" placeholder="Enter new contact" type="number"
            value="{{ Auth::user()->contact_info }}" />
    </div>

    <!-- Address -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="address">Address</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="address" name="address" placeholder="Enter new address" type="text"
            value="{{ Auth::user()->address }}" />
    </div>

    <!-- Date of Birth -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="date_of_birth">Date Of Birth</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="date_of_birth" name="date_of_birth" type="date"
            value="{{ Auth::user()->date_of_birth }}" />
    </div>

    <!-- Gender -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="gender">Gender</label>
        <select class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="gender" name="gender">
            <option value="" disabled>Select your gender</option>
            <option value="male" {{ Auth::user()->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ Auth::user()->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <!-- Nationality -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="nationality">Nationality</label>
        <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            id="nationality" name="nationality" placeholder="Enter new nationality" type="text"
            value="{{ Auth::user()->nationality }}" />
    </div>

    <!-- Buttons -->
    <div class="flex justify-center space-x-4 mb-4">
        <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">
            Save Changes
        </button>

        @if( Auth::user()->role == 1 )
        <a class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500" href="/dashboard">
            Cancel
        </a>
        @else
        <a class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500" href="/mybookings">
            Cancel
        </a>
        @endif

    </div>
</form>




   </div>
  </div>



  <script>
   document.getElementById('profile-picture').addEventListener('change', function() {
    var fileName = this.files[0].name;
    document.getElementById('file-name').textContent = fileName;
   });
  </script>
 </body>
</html>