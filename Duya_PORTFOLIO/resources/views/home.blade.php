@include('components.viewerheader')
    <div class="hero py-10">
        <div class="hero-content text-center">
            <div>
            <h1 class="text-5xl font-bold">Hello there, my name is <span class="text-primary">Aaron</span></h1>
            <p class="py-6 text-lg">
                Welcome to my portfolio. A final requirement for the course entitled <span class="text-secondary">Web Development 2</span>. 
                <br>The goal of which is to introduce myself and showcase the projects I have created so far.
            </p>
            <form action="/showAllGuest">
                <button class="btn btn-primary">See my projects</button>
            </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 p-6 gap-6">
        <div class="card bg-base-100 w-full shrink-0 shadow-2xl">
            <div class="card-body">
                <h2 class="text-3xl font-bold"><span class="text-primary">@</span> Aaron Paul Agustin Duya</h2>
                <ul class="list-disc list-inside">
                    <li class="text-lg">Currently pursuing a Bachelor of Science in <span class="text-secondary">Computer Science</span></li>
                    <li class="text-lg">Recognized as a consistent <span class="text-accent">Dean's lister</span> since Freshman year</li>
                    <li class="text-lg">Focused on becoming a Full-stack <span class="text-accent">Web</span> and <span class="text-accent">Mobile </span>developer</li>
                    <li class="text-lg">Working toward graduating with <span class="text-secondary">Latin honors</span></li>
                    <li class="text-lg">Committed to gaining <span class="text-secondary">real-world experience </span>for industry readiness</li>
                </ul>
            </div>
        </div>


        <div class="card bg-base-100 w-full shrink-0 shadow-2xl">
            <div class="card-body">
                <h2 class="text-3xl font-bold"><span class="text-primary">@</span> Developer Background</h2>
                <ul class="list-disc list-inside">
                    <li class="text-lg">Proficient in <span class="text-secondary">Laravel Backend Development</span></li>
                    <li class="text-lg">Studied <span class="text-accent">Node.js </span>and implemented a MERN stack</li>
                    <li class="text-lg">Built applications ranging from 
                        <span class="text-accent">Notepads</span> and <span class="text-accent">Information Systems</span>
                    </li>
                    <li class="text-lg">Currently working on my <span class="text-secondary">Front-end</span> skills</li>
                    <li class="text-lg">Planning to commit on learning <span class="text-secondary">Flutter </span>for Mobile Development</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="hero py-5">
        <div class="hero-content text-center">
            <div>
            <h1 class="text-4xl font-bold"><span class="text-primary">@</span> My Interests</h1>
            <p class="py-6 text-lg">
                These are things that I am particularly interested in.
                <br>Curiosity may kill the cat, but it at least got the answers before it met its end.
            </p>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col lg:flex-row p-6">
        <div class="bg-base-100 p-6 rounded-md lg:w-1/2 shadow-xl">
            <h2 class="text-2xl font-bold"><span class="text-info">Studying</span></h2>
            <p class="text-lg">I love being a nerd on a diverse set of topics, whether academic, fictional, or random stuff.<br>
            You'll see my Chatgpt, browsers, YouTube reccommendations to be filled of random discussion about a particular topic.</p>
        </div>
        <div class="divider lg:divider-horizontal"></div>
        <div class="card bg-base-300 rounded-box overflow-hidden lg:w-1/2 shadow-xl">
            <img
            src="/images/studying.jpg"
            alt="Shoes" class="w-full h-64 object-cover"/>
        </div>
    </div>

    <div class="flex w-full flex-col lg:flex-row p-6">
        <div class="bg-base-100 p-6 rounded-md lg:w-1/2 shadow-xl">
            <h2 class="text-2xl font-bold"><span class="text-info">Human Behavior</span></h2>
            <p class="text-lg">I am curious about the reason behind human actions and decisions, the patterns they exhibit, and how it correlates to their background.<br>
            Prior to choosing Computer Science as my program, I initially actually planned on picking Pyschology.</p>
        </div>
        <div class="divider lg:divider-horizontal"></div>
        <div class="card bg-base-300 rounded-box overflow-hidden lg:w-1/2 shadow-xl">
            <img
            src="/images/psychology.jpg"
            alt="Shoes" class="w-full h-64 object-cover"/>
        </div>
    </div>

    <div class="flex w-full flex-col lg:flex-row p-6">
        <div class="bg-base-100 p-6 rounded-md lg:w-1/2 shadow-xl">
            <h2 class="text-2xl font-bold"><span class="text-info">Teaching</span></h2>
            <p class="text-lg">I only started becoming academically competent in my Senior year of High School.<br>
            When I began understanding the topics I used to scoff, I realized teaching people can be fun.</p>
        </div>
        <div class="divider lg:divider-horizontal"></div>
        <div class="card bg-base-300 rounded-box overflow-hidden lg:w-1/2 shadow-xl">
            <img
            src="/images/teach.jpg"
            alt="Shoes" class="w-full h-64 object-cover"/>
        </div>
    </div>

    <div class="hero py-5">
        <div class="hero-content text-center">
            <div>
            <h1 class="text-4xl font-bold"><span class="text-primary">@</span> My Hobbies</h1>
            <p class="py-6 text-lg">
                These are the hobbies that keep me entertained.
                <br>They ensure my daily life remains interesting enough to wish to see tomorrow.
            </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 gap-6">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-accent text-2xl">Playing games</h2>
                <p>From competitve video games such as Mobile Legends, Valorant, and League of Legends to single-player games such as Sekiro, Lies of P, and Dark Souls.</p>
            </div>
            <figure>
                <img
                src="/images/valorant.jpg"
                alt="Shoes" class="w-full h-64 object-cover"/>
            </figure>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-accent text-2xl">Watching Movies and Tv-series</h2>
                <p>Like any other human being, I of course watch for entertainment purposes. However, I like analyzing and studying films and tv-series, admiring those written in such quality, and scoffing at those heavily-budgeted but poorly executed pieces.</p>
            </div>
            <figure>
                <img
                src="/images/movies.jpg"
                alt="Shoes" class="w-full h-64 object-cover"/>
            </figure>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-accent text-2xl">Writing</h2>
                <p>Fiction writing has always been a passion of mine growing up. I've written short ones, but I've yet to publish a full novel. However, it is my goal in life to be recognized in this field.</p>
            </div>
            <figure>
                <img
                src="/images/script.jpg"
                alt="Shoes" class="w-full h-64 object-cover"/>
            </figure>
        </div>
    </div>
@include('components.footer')