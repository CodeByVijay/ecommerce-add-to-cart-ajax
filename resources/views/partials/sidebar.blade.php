 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li> <a class="waves-effect waves-dark" href="{{route('adminDashboard')}}" aria-expanded="false"><i
                             class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                 </li>
                 <li> <a class="waves-effect waves-dark" href="{{route('allProduct')}}" aria-expanded="false"><i
                             class="fa fa-table"></i><span class="hide-menu">Products</span></a>
                 </li>
                 <li> <a class="waves-effect waves-dark" href="{{route('addProductForm')}}" aria-expanded="false"><i
                             class="fa fa-plus"></i><span class="hide-menu">Add New Product</span></a>
                 </li>
                 <li> <a class="waves-effect waves-dark" href="{{route('adminLogout')}}" aria-expanded="false"><i
                             class="fa fa-sign-out"></i><span class="hide-menu">Logout</span></a>
                 </li>
             </ul>
             {{-- <div class="text-center mt-4">
                        <a href="https://www.wrappixel.com/templates/adminwrap/"
                            class="btn waves-effect waves-light btn-info hidden-md-down text-white"> Upgrade to Pro</a>
                    </div> --}}
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
