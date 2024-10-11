<template>
    <header style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000; background-image: url('template/images/slides/slides_1.jpg'); background-size: cover; background-repeat: no-repeat;">
        <div class="flex flex-wrap">
            <div class="w-full">
                <nav class="flex items-center justify-center bg-gray-900 bg-opacity-75 p-4 relative">
                    <button class="text-white p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200" @click="toggleNavbar">
                        <span class="icon-menu"></span>
                    </button>
                    <div class="hidden md:flex flex-grow justify-center">
                        <ul class="flex space-x-4 items-center">
                            <li class="mx-8">
                                <a href="https://minsu.edu.ph/" class="block">
                                    <img class="h-[130px] w-[130px]" src='template/images/logo.png' alt="logo">
                                </a>
                            </li>

<!--                            &lt;!&ndash; About Dropdown &ndash;&gt;-->
<!--                            <li class="relative group">-->
<!--                                <a href="#" class="text-white hover:text-gray-300 focus:outline-none">About</a>-->
<!--                                <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/about/history">History</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/about/vmgo">VMGO</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/about/hymn">Hymn</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/about/core-values">Core Values</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/about/quality-policy">Quality Policy</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->

<!--                            &lt;!&ndash; Good Governance Dropdown &ndash;&gt;-->
<!--                            <li class="relative group">-->
<!--                                <a href="#" class="text-white hover:text-gray-300 focus:outline-none">Good Governance</a>-->
<!--                                <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/good-governance/citizens-charter">Citizen's Charter</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/good-governance/transparency">Transparency</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/good-governance/freedom-of-information">Freedom of Information</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/good-governance/philgeps">PhilGEPS</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->

<!--                            &lt;!&ndash; Academics Dropdown &ndash;&gt;-->
<!--                            <li class="relative group">-->
<!--                                <a href="#" class="text-white hover:text-gray-300 focus:outline-none">Academics</a>-->
<!--                                <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/academics/admission">Admission</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/academics/programs">Programs</a></li>-->
<!--                                    <li class="relative group">-->
<!--                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Offices</a>-->
<!--                                        <ul class="absolute left-[-200px] hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://sites.google.com/view/minsu-osas/home" target="_blank" rel="noopener noreferrer">Student Affairs and Services</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/academics/offices/office-of-the-guidance-counselor">Guidance Counselor</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/academics/offices/office-of-the-registrar">Registrar's Office</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/academics/offices/office-of-national-service-training-program">NSTP</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->

<!--                            &lt;!&ndash; Administration Dropdown &ndash;&gt;-->
<!--                            <li class="relative group">-->
<!--                                <a href="#" class="text-white hover:text-gray-300 focus:outline-none">Administration</a>-->
<!--                                <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/administration/key-officials">Key Officials</a></li>-->
<!--                                    <li class="relative group">-->
<!--                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Offices</a>-->
<!--                                        <ul class="absolute left-[-576px] hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/administration/offices/office-of-the-president">Office of the President</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/administration/offices/office-of-the-vice-president-for-academic-affairs">Office of the Vice President for Academic Affairs</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/administration/offices/office-of-the-vice-president-for-admin-and-finance">Office of the Vice President for Administration and Finance</a></li>-->
<!--                                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="https://minsu.edu.ph/administration/offices/office-of-the-vice-president-for-research-extension-and-development">Office of the Vice President for Research, Extension, and Development</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->

<!--                            &lt;!&ndash; Research &ndash;&gt;-->
<!--                            <li><a href="https://minsu.edu.ph/research/research-extension-and-development" class="text-white hover:text-gray-300">Research</a></li>-->

<!--                            &lt;!&ndash; Services Dropdown &ndash;&gt;-->
<!--                            <li class="relative group">-->
<!--                                <a href="#" class="text-white hover:text-gray-300 focus:outline-none">Services</a>-->
<!--                                <ul class="absolute left-0 hidden group-hover:block bg-white shadow-lg mt-2 rounded-md z-50">-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" target="_blank" href="https://library.minsu.edu.ph/">Library</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" target="_blank" href="https://outlook.office365.com/mail/inbox">Mailing</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" target="_blank" href="https://minsu.edu.ph/services/mail-list">Email List</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" target="_blank" href="https://minsu.edu.ph/services/jobvacants">Job Vacancy</a></li>-->
<!--                                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" target="_blank" href="https://minsu.edu.ph/services/cmc-functions">Crisis Management Committee</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style scoped>
.group:hover .group-hover\:block {
    display: block; /* This can also be changed to 'flex' if needed */
}

/* Optional: Additional styling for dropdown items */
.dropdown-item {
    transition: background-color 0.2s; /* Add smooth background transition */
}

.dropdown-item:hover {
    background-color: rgba(229, 231, 235, 1); /* Light gray hover effect */
}
</style>
