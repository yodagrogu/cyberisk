@extends('theme::layouts.app')


@section('content')

<!-- Connecting to Database -->
<?php
    // Username is root
    $user = 'root';
    $password = 'password';

    // Database name is geeksforgeeks
    $database = 'cyberisk';

    // Server is localhost with
    // port number 3306
    $servername='localhost:3306';
    $mysqli = new mysqli($servername, $user,
                    $password, $database);

    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
    }

    // SQL query to select data from database
    $sql = " SELECT * FROM controls ORDER BY id DESC ";
    $result = $mysqli->query($sql);
    $mysqli->close();
?>


<!-- Call to Action -->
<section class="relative px-6 overflow-hidden bg-gray-800 md:px-8">
    <div class="relative flex flex-wrap py-5 mx-auto md:py-3 max-w-7xl sm:pr-5 md:pr-0 sm:flex-nowrap sm:justify-center sm:items-center">
        <div class="inline-flex items-center order-1 w-11/12 max-w-screen-sm mb-2 text-sm text-white sm:order-none sm:w-auto md:text-base sm:mb-0">
            <span class="hidden mr-2 text-2xl md:block">🎉</span> Unlock full benefits with Pro
        </div>

        <div class="order-last inline-block w-full px-4 py-3 order-2 w-1/12 sm:order-none sm:w-auto sm:absolute sm:right-0 sm:-mr-1 xl:mr-3">
            <a href="{{ url('pricing') }}" target="_blank" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
				Get Full Access
	        </a>
        </div>
    </div>
</section>

<!-- Flowbite Requirements -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css"  rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

<!-- Welcome to your Dashboard -->
<section class="h-auto bg-white">
    <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
        <p class="mt-1 text-4xl font-semibold text-indigo-600 sm:text-5xl sm:tracking-tight lg:text-6xl">Welcome to your Dashboard</p>
        <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Are you ready to start updating your cyber security controls?</p>
    </div>
</section>

<!-- Tabs at the top of the Dashboard -->
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
<div class="mx-auto max-w-screen-xl px-4 lg:px-12">
<div class="tab-wrapper flex flex-wrap justify-center -mb-px" x-data="{ activeTab:  0 }">
    <div class="flex">
        <button
        @click="activeTab = 0"
        class="tab-control mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:font-bold hover:border-gray-300 dark:hover:text-gray-300"
        :class="{ 'active': activeTab === 0 }"
        >Overview</button>
        <button
        @click="activeTab = 1"
        class="tab-control mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:font-bold hover:border-gray-300 dark:hover:text-gray-300"
        :class="{ 'active': activeTab === 1 }"
        >Insert New Record</button>
        <button
        @click="activeTab = 2"
        class="tab-control mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:font-bold hover:border-gray-300 dark:hover:text-gray-300"
        :class="{ 'active': activeTab === 2 }"
        >Update Records</button>
    </div>



<!-- Security Controls Table - Overview Tab-->
<div class="tab-panel" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                <!-- Section Title -->
                <div class="relative flex-1">
                    <h class="text-xl font-medium leading-6 text-gray-700">
                        Security Controls Table
                    </h>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                <!-- Search Function - Works with threats -->
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" name="search" action="" method = "get">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="search" id="myInput" onkeyup="myFunction()" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for cyber security threat..." required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>

                            <!-- Capture Search Bar input -->
                            <?php
                                try{
                                    $myInput = $_GET["myInput"];
                                }
                                catch (Exception $e) {
                                }
                            ?>
                        </div>
                    </form>

                </div>

                <!-- Actions - need to fix this -->
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                    <!-- Add Security Control - need to fix this -->
                    <button type="button" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Security Control
                    </button>


                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                            Actions
                        </button>
                        <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export all</a>
                            </div>
                        </div>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>

                        <!-- Filter Drop Down - need to fix this -->
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose Status</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">In Place</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Not In Place</label>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Table Headers -->
            <div class="overflow-x-auto">
                <table id = "myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Security Control</th>
                            <th scope="col" class="px-4 py-3">Threat</th>
                            <th scope="col" class="px-4 py-3">Inherent Risk</th>
                            <th scope="col" class="px-4 py-3">Implementation Status</th>
                            <th scope="col" class="px-4 py-3">Residual Risk</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Security Control List -->
                        <?php
                            // LOOP TILL END OF DATA
                            while($rows=$result->fetch_assoc())
                            {
                        ?>
                        <tr class="border-b dark:border-gray-700">
                            <!-- Pulling data from every row of the DB columns -->
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $rows['name'];?></th>
                            <td class="px-4 py-3"><?php echo $rows['threat'];?></td>
                            <td class="px-4 py-3"><?php echo $rows['inh_risk'];?></td>
                            <td class="px-4 py-3"><?php echo $rows['status'];?></td>
                            <td class="px-4 py-3"><?php echo $rows['res_risk'];?></td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="training-dropdown-button" data-dropdown-toggle="training-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="training-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="training-dropdown-button">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                    </ul>
                                    <form method="get">
                                        <div class="py-1">
                                            <input type="submit" value="Delete" name="delete" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>

            <!-- Page Navigation - need to fix this -->
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</section>
</div>



<!-- Security Controls Form - Add New Controls -->
<div class="tab-panel" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                <!-- Section Title -->
                <div class="relative flex-1">
                    <h class="text-lg font-medium leading-6 text-gray-700">
                        Add a New Security Control
                    </h>
                </div>

            </div>

            <div class="items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

            <!-- Form for New Controls -->

            <form method="get">
                    <div class="relative p-2 leading-6 grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="sec_control" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Security Control</label>
                            <input type="text" name="control" id="sec_control" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Training" required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Threat</label>
                            <input type="text" name="threat" id="threat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phishing" required>
                        </div>

                        <div>
                        <label for="inh_risk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Inherent Risk</label>
                            <select name="inh_risk" id="inh_risk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Risk Level</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                            </select>
                        </div>

                        <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Implementation Status</label>
                            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Status</option>
                            <option value="In Place">In Place</option>
                            <option value="Not In Place">Not In Place</option>
                            </select>
                        </div>

                        <div>
                        <label for="res_risk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Residual Risk</label>
                            <select name="res_risk" id="res_risk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Risk Level</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I'd like to add a new security control.</label>
                    </div>

                <input type="submit" value="Submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </form>

                <!-- Capture Form Input -->
                <?php
                    try{
                        $sec_control = $_GET["control"];
                        $threat = $_GET["threat"];
                        $res_risk = $_GET["res_risk"];
                        $status = $_GET["status"];
                        $inh_risk = $_GET["inh_risk"];
                    }
                    catch (Exception $e) {
                    }
                ?>

            </div>
        </div>

    </div>
</section>
</div>

</div>
</div>
</section>

<!-- Script for Search Function in table -->
<script>
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>

<!-- Insert & Delete Record into DB -->
<?php
    // Username is root
    $user = 'root';
    $password = 'password';

    // Database name is geeksforgeeks
    $database = 'cyberisk';

    // Server is localhost with
    // port number 3306
    $servername='localhost:3306';
    $mysqli = new mysqli($servername, $user,
                    $password, $database);

    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
    }

    // SQL query to add new control
    try{
        $sql = "INSERT INTO controls (name, threat, inh_risk, status, res_risk)
        VALUES ('$sec_control', '$threat', '$inh_risk', '$status', '$res_risk')";
        $result = $mysqli->query($sql);
    }
    catch (Exception $e) {
    }

    if ($result === TRUE) {
    echo "New record created successfully";
    } else {
    }

    // SQL query to delete control
    try{
        if(isset($_GET['delete'])) {
            $id=$_REQUEST['id'];
            echo $id;
        }
    }
    catch (Exception $e) {
    }
    // Check for delete button
    try{
        if(isset($_GET['delete'])) {
            echo "Delete is selected";
        }
    }
    catch (Exception $e) {
    }


    $mysqli->close();
?>



    <!-- Original Wave Dashboard -->
	<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
	    <div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
					<svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
	                    Welcome to your Dashboard
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
	                    Learn More Below
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
	            <p class="text-base leading-loose text-gray-500">This is your application <a href="{{ route('wave.dashboard') }}" class="underline text-wave-500">dashboard</a>, you can customize this view inside of <code class="px-2 py-1 font-mono text-base font-medium text-gray-600 bg-gray-100 rounded-md">{{ theme_folder('/dashboard/index.blade.php') }}</code><br><br> (Themes are located inside the <code>resources/views/themes</code> folder)</p>
				<span class="inline-flex mt-5 rounded-md shadow-sm">
	                <a href="{{ url('docs') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
	                    Read The Docs
	                </a>
				</span>
			</div>
		</div>
		<div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg lg:ml-3 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
					<svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
						Learn more about Wave
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
						Are you more of a visual learner?
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
				<p class="text-base leading-loose text-gray-500">Make sure to head on over to the Wave Video Tutorials to learn more how to use and customize Wave.<br><br>Click on the button below to checkout the video tutorials.</p>
				<span class="inline-flex mt-5 rounded-md shadow-sm">
	                <a href="https://devdojo.com/course/wave" target="_blank" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
						Watch The Videos
	                </a>
				</span>
			</div>
	    </div>

	</div>

@endsection
