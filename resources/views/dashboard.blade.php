 @extends('layouts.main')

 @section('content')
     <!-- Page header -->
     <div class="page-header d-print-none">
         <div class="container-xl">
             <div class="row g-2 align-items-center">
                 <div class="col">
                     <!-- Page pre-title -->
                     <div class="page-pretitle">
                         Overview
                     </div>
                     <h2 class="page-title">
                         Dashboard SiCantik
                     </h2>
                 </div>

             </div>
         </div>
     </div>
     <!-- Page body -->
     <div class="page-body">
         <div class="container-xl">
             <div class="row row-deck row-cards">
                 <div class="col-12">
                     <div class="row row-cards">
                         <div class="col-sm-6 col-lg-3">
                             <a href="{{ route('users') }}" class="text-decoration-none">
                                 <div class="card card-sm">
                                     <div class="card-body">
                                         <div class="row align-items-center">
                                             <div class="col-auto">
                                                 <span
                                                     class="bg-cyan text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                         <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                         <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                         <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                         <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                         <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                         <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="col">
                                                 <div class="h1 mb-0 text-cyan">
                                                     {{ $totalUsers }}
                                                 </div>
                                                 <div class="text-muted">
                                                     REGISTERED USERS
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </a>

                         </div>
                         <div class="col-sm-6 col-lg-3">
                             <a href="{{ route('questions') }}" class="text-decoration-none">
                                 <div class="card card-sm">
                                     <div class="card-body">
                                         <div class="row align-items-center">
                                             <div class="col-auto">
                                                 <span
                                                     class="bg-lime text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="icon icon-tabler icons-tabler-outline icon-tabler-list-numbers">
                                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                         <path d="M11 6h9" />
                                                         <path d="M11 12h9" />
                                                         <path d="M12 18h8" />
                                                         <path d="M4 16a2 2 0 1 1 4 0c0 .591 -.5 1 -1 1.5l-3 2.5h4" />
                                                         <path d="M6 10v-6l-2 2" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="col">
                                                 <div class="h1 mb-0 text-lime">
                                                     {{ $totalQuestions }}
                                                 </div>
                                                 <div class="text-muted">
                                                     TEST QUESTIONS
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </a>

                         </div>

                         <div class="col-sm-6 col-lg-3">
                             <a href="{{ route('modules') }}" class="text-decoration-none">
                                 <div class="card card-sm">
                                     <div class="card-body">
                                         <div class="row align-items-center">
                                             <div class="col-auto">
                                                 <span
                                                     class="bg-cyan text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                         <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                                         <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                                         <path d="M3 6l0 13" />
                                                         <path d="M12 6l0 13" />
                                                         <path d="M21 6l0 13" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="col">
                                                 <div class="h1 mb-0 text-cyan">
                                                     {{ $totalModules }}
                                                 </div>
                                                 <div class="text-muted">
                                                     MODULES
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </a>

                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-3">
                     <div class="card">
                         <div class="card-body">
                             <div class="d-flex align-items-center">
                                 <div class="subheader">Pre Test</div>

                             </div>
                             <div class="mb-2 ">
                                 <p class="h1 text-teal mb-2">75%</p>
                                 <span>of the users have completed the test.</span>
                             </div>
                             <div class="progress progress-sm">
                                 <?php
                                 $progress = 50;

                                 ?>
                                 <div class="progress-bar bg-teal" style="width: {{ $progress }}%" role="progressbar"
                                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                     <span class="visually-hidden">75% Complete</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-lg-3">
                     <div class="card">
                         <div class="card-body">
                             <div class="d-flex align-items-center">
                                 <div class="subheader">Post Test</div>

                             </div>
                             <div class="mb-2 ">
                                 <p class="h1 text-teal mb-2">0%</p>
                                 <span>of the users have completed the test.</span>
                             </div>
                             <div class="progress progress-sm">
                                 <?php
                                 $progress = 0;

                                 ?>
                                 <div class="progress-bar bg-teal" style="width: {{ $progress }}%" role="progressbar"
                                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                     <span class="visually-hidden">75% Complete</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>



                 {{-- <div class="col-md-6 col-lg-4">
                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">Social Media Traffic</h3>
                         </div>
                         <table class="table card-table table-vcenter">
                             <thead>
                                 <tr>
                                     <th>Network</th>
                                     <th colspan="2">Visitors</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>Instagram</td>
                                     <td>3,550</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width:1%"></div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Twitter</td>
                                     <td>1,798</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 35.96%">
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Facebook</td>
                                     <td>1,245</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>TikTok</td>
                                     <td>986</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 19.72%">
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Pinterest</td>
                                     <td>854</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 17.08%">
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>VK</td>
                                     <td>650</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Pinterest</td>
                                     <td>420</td>
                                     <td class="w-50">
                                         <div class="progress progress-xs">
                                             <div class="progress-bar bg-primary" style="width: 8.4%"></div>
                                         </div>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div> --}}


             </div>
         </div>
     </div>
 @endsection
