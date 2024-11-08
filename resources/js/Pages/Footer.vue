<template>
    <footer class="bg-cover bg-center bg-no-repeat py-2"
            style="background-image: url('/slider/slides_2.jpg'); background-size: cover; width: 100%; margin: 0; background-repeat: no-repeat;position:; bottom: 0; left: 0; right: 0; ;">
        <div class="bg-black bg-opacity-50 py-4"> <!-- Added a black overlay with opacity -->
            <div class="mx-auto"> <!-- Remove container class to eliminate extra margins -->
                <div class="flex flex-wrap items-center">
                    <!-- Logo and Copyright -->
                    <div class="w-full md:w-1/4 text-center">
                        <a href="https://minsu.edu.ph">
                            <img src='/template/images/logo.png' class="mx-auto h-48" alt="footer_logo">
                        </a>
                        <p class="text-white mt-2 text-lg"> <!-- Increased font size -->
                            2024 © Copyright
                            <br>Managed and maintained by MinSU MIS Office
                        </p>
                    </div>
                    <!-- Core Values and Contact Info -->
                    <div class="w-full md:w-1/3 text-white">
                        <h3 class="text-xl mb-2">MinSU Core Values</h3>
                        <ul class="space-y-2 text-lg">
                            <li><u>R</u><small>ESILIENCE</small></li>
                            <li><u>I</u><small> NTEGRITY</small></li>
                            <li><u>C</u><small>OMMITMENT</small></li>
                            <li><u>E</u><small>XCELLENCE</small></li>
                        </ul>
                        <div class="mt-4">
                            <h3 class="text-xl mb-2">Contact us</h3>
                            <p class="text-lg"> <!-- Increased font size -->
                                <span class="font-bold">Address:</span> Alcate, Victoria Oriental Mindoro
                                <br><span class="font-bold">Email:</span> universitypresident@minsu.edu.ph
                                <br><span class="font-bold">Phone:</span> +639778467228
                            </p>
                        </div>
                    </div>
                    <!-- Governance Icons and Social Media -->
                    <div class="w-full md:w-2/5">
                        <!-- Governance Icons -->
                        <div class="flex justify-center mb-4 space-x-4">
                            <a href="https://www.foi.gov.ph/requests/?q=Mindoro+State+University" target="_blank">
                                <img src="/template/images/governance/foi.png" class="h-28 object-contain opacity-90 hover:opacity-100" alt="foi-img">
                            </a>
                            <a href="https://minsu.edu.ph/good-governance/philgeps">
                                <img src="/template/images/governance/philgeps.png" class="h-28 object-contain" alt="philgeps-img">
                            </a>
                            <a href="https://minsu.edu.ph/good-governance/transparency">
                                <img src="/template/images/governance/transparencyseal.png" class="h-28 object-contain" alt="transparency-img">
                            </a>
                        </div>
                        <!-- Social Media Icons -->
                        <h3 class="text-xl text-white mb-4">Connect with us</h3>
                        <div class="flex justify-center space-x-4">
                            <a href="https://www.facebook.com/TheMinSUOfficial" target="_blank">
                                <svg class="text-white w-10 h-10 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M22.675 0h-21.35C.56 0 0 .563 0 1.25v21.5C0 23.437.563 24 1.25 24h21.5C23.437 24 24 23.437 24 22.75V1.25C24 .563 23.437 0 22.675 0zM12 24h-3.5v-10h-2.5V12h2.5v-3c0-3.49 2.037-5.5 5-5.5 1.42 0 2.5.106 2.5.106v2.75h-1.4c-1.21 0-1.6.759-1.6 1.54v1.9h2.9l-.462 2.5h-2.438V24H12z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/TheMinSUOfficial" target="_blank">
                                <svg class="text-white w-10 h-10 hover:text-pink-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.162c3.207 0 3.583.012 4.84.07 1.165.058 1.963.246 2.42.4.54.19 1.07.43 1.5.87.43.43.68.96.87 1.5.154.457.342 1.255.4 2.42.058 1.257.07 1.633.07 4.84s-.012 3.583-.07 4.84c-.058 1.165-.246 1.963-.4 2.42-.19.54-.43 1.07-.87 1.5-.43.43-.96.68-1.5.87-.457.154-1.255.342-2.42.4-1.257.058-1.633.07-4.84.07s-3.583-.012-4.84-.07c-1.165-.058-1.963-.246-2.42-.4-.54-.19-1.07-.43-1.5-.87-.43-.43-.68-.96-.87-1.5-.154-.457-.342-1.255-.4-2.42C2.162 15.583 2.15 15.207 2.15 12c0-3.207.012-3.583.07-4.84.058-1.165.246-1.963.4-2.42.19-.54.43-1.07.87-1.5.43-.43.96-.68 1.5-.87.457-.154 1.255-.342 2.42-.4C8.417 2.174 8.793 2.162 12 2.162zM12 5.838c-3.184 0-5.838 2.654-5.838 5.838S8.816 17.514 12 17.514 17.838 14.86 17.838 11.676 15.184 5.838 12 5.838zm0 10.193a4.355 4.355 0 1 1 0-8.71 4.355 4.355 0 0 1 0 8.71zM17.537 4.463a1.079 1.079 0 1 0 0-2.158 1.079 1.079 0 0 0 0 2.158z"/>
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/@TheMinSUOfficial" target="_blank">
                                <svg class="text-white w-10 h-10 hover:text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.498 6.186c-.261-1.065-1.048-1.909-2.069-2.028C19.09 4 12 4 12 4s-7.09 0-9.429.158c-1.021.119-1.808.963-2.069 2.028C.003 7.848 0 12 0 12s.003 4.152.502 5.814c.261 1.065 1.048 1.909 2.069 2.028C4.91 20 12 20 12 20s7.09 0 9.429-.158c1.021-.119 1.808-.963 2.069-2.028C23.997 16.152 24 12 24 12s-.003-4.152-.502-5.814zM9.545 15.127V8.873l5.909 3.127-5.909 3.127z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<style>
footer.about-style2 {
    padding: 30px 0;
    background-color: #0f3d1c;
}

footer .foot-logo img {
    max-height: 150px;
}

footer .foot-logo h4 {
    margin: 0;
    color: #ffffff;
    font-size: 24px;
}

footer .social-icons img {
    max-width: 40px;
    margin: 0 10px;
}

/* Optional: Add text shadow for better visibility */
.text-white {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
}
</style>
