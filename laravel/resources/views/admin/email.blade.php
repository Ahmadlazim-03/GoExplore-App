<html>
<head>
    <title>Email Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-10">
        <div class="bg-blue-600 p-6">
            <h1 class="text-3xl text-white font-bold">New Message Received</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Message Details</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="text-xl font-semibold">Name</h3>
                    <p class="text-gray-600">{{ $email->name }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Email</h3>
                    <p class="text-gray-600">{{ $email->email }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Subject</h3>
                    <p class="text-gray-600">{{ $email->subject }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Message</h3>
                    <p class="text-gray-600">
                        {{ $email->pesan }}
                    </p>
                </div>
            </div>
        </div>
        <div class="p-6 flex justify-end">
            <a href="/dashboard">
            <button class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Back
            </button>
            </a>
        </div>
    </div>
</body>
</html>