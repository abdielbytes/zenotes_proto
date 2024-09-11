<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenotes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white">

    <!-- Navigation Bar -->
    <nav class="bg-gray-900 p-4 flex justify-between items-center">
        <div class="text-xl font-bold">Zenotes</div>
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
    </nav>

    <!-- Header Section -->
    <header class="text-center py-8">
        <h1 class="text-4xl font-bold">Welcome to NotesApp!</h1>
        <p class="text-lg mt-2">Your Ultimate Classroom Companion</p>
    </header>

    <!-- Main Content -->
    <div class="main-content flex flex-col items-center text-center px-4 py-8">

        <!-- Features Container -->
        <div class="features-container flex flex-wrap justify-center">
            
            <!-- Feature 1: Record Lectures -->
            <section
                class="feature bg-white text-black rounded-lg shadow-lg p-6 m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 transition-transform transform hover:-translate-y-2">
                {{-- <img src="audio-recording.png" alt="Audio Recording Feature" class="rounded-lg mb-4"> --}}
                <h2 class="text-2xl font-semibold">Record Lectures & Take Live Notes</h2>
                <p class="mt-2">Capture audio recordings of lectures and automatically transcribe them into notes in
                    real-time.</p>
            </section>

            <!-- Feature 2: Write and Edit Notes -->
            <section
                class="feature bg-white text-black rounded-lg shadow-lg p-6 m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 transition-transform transform hover:-translate-y-2">
                {{-- <img src="write-edit-notes.png" alt="Write and Edit Notes" class="rounded-lg mb-4"> --}}
                <h2 class="text-2xl font-semibold">Write and Edit Notes</h2>
                <p class="mt-2">Write down your thoughts, edit existing notes, and keep everything organized in one
                    place.</p>
            </section>

            <!-- Feature 3: Share Notes -->
            <section
                class="feature bg-white text-black rounded-lg shadow-lg p-6 m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 transition-transform transform hover:-translate-y-2">
                {{-- <img src="share-notes.png" alt="Share Notes" class="rounded-lg mb-4"> --}}
                <h2 class="text-2xl font-semibold">Share Notes Instantly</h2>
                <p class="mt-2">Share your notes with classmates or friends easily. Collaboration has never been this
                    smooth!</p>
            </section>

            <!-- Feature 4: Add Pictures to Notes -->
            <section
                class="feature bg-white text-black rounded-lg shadow-lg p-6 m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 transition-transform transform hover:-translate-y-2">
                {{-- <img src="add-images.png" alt="Add Pictures to Notes" class="rounded-lg mb-4"> --}}
                <h2 class="text-2xl font-semibold">Add Pictures to Your Notes</h2>
                <p class="mt-2">Make your notes more engaging by adding pictures. Capture diagrams, slides, or anything
                    important.</p>
            </section>

        </div>

        <!-- Get Started Button -->
        <button class="btn-start bg-blue-600 text-white py-3 px-6 rounded-md mt-6 hover:bg-blue-500 transition-colors">
            Get Started
        </button>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-center p-4">
        <p class="text-sm">&copy; 2024 NotesApp. All rights reserved.</p>
    </footer>

</body>

</html>
